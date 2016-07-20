<?php
// Data population script
// Pulls data from reddit and
// inserts it into the Saiddit DB

include('../saiddit/db_utils/connect.php');

$salt = 'somesortofsalt';

// Given an array of dictionaries keyed with the column
// name for a table, insert those
function doInsert($conn, $table, $data) {

    // Create an array of strings for doing an insert
    $values = array();
    foreach($data as &$items) {
        $str = "('" . implode("','", $items) . "')";

        // This is saiddit not reddit ;)
        $str = str_replace("reddit", "saiddit", $str);
        $str = str_replace("Reddit", "Saiddit", $str);

        array_push($values, $str);
    }

    // Do a seperate insert for each row so if one fails
    // we don't lose the whole batch
    foreach($values as &$row) {

        // Create query statement
        $query = sprintf(
            "REPLACE INTO %s (%s) VALUES %s",
            $table,
            implode(",", array_keys($data[0])),
            $row
        );

        // Execute
        $result = mysqli_query($conn, $query);

        // Print query if it failed to execute
        if (!$result) {
            echo $table . " insert failed!\n";
            echo $query . "\n";
        }
    }
}

// Wrapper for cleaning a string prior to insert
function clean($conn, $str) {
    return mysqli_real_escape_string($conn, $str);
}

// Program main
function main() {

    global $salt; //global variables in PHP need to be declared in scope.
    
    // Create connection to the database
    $conn = db_connect();

    // Get users and insert into an array
    $userquery = "SELECT * FROM accounts";
    $result = mysqli_query($conn, $userquery);
    $users = array();

    // Make sure there are users to use
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($users, $row);
        }
    } else {
        echo "There must be users currently in the database!\n";
        die();
    }

    // Get popular subreddits from reddit
    $base = "https://www.reddit.com";
    $url = $base . "/subreddits/popular/.json";

    echo "Getting popular subreddits\n";
    $response = file_get_contents($url);
    $response = json_decode($response);

    // Extract data we are interested in and store into an array
    // of dictionaries keyed on the column name of the subsaiddits table
    $newSubsaiddits = array();
    $inc = 0;
    $item = array();
    foreach($response->data->children as &$sub) {
        $item['title'] = clean($conn, $sub->data->display_name);
        $item['description'] = clean($conn, $sub->data->header_title);
        $rand = array_rand($users);
        $item['creator_key'] = $users[$rand]['username'];
        if ($inc < 10) {
            $item['front_page'] = 1;
        } else {
            $item['front_page'] = 0;
        }
        
        $inc++;
        array_push($newSubsaiddits, $item);
    }

    // Insert subsaiddits into database
    echo "\tReceived: " . count($newSubsaiddits);
    echo "\n\tInserting into DB\n";

    doInsert($conn, "subsaiddits", $newSubsaiddits);

    echo "\nRetrieving posts for each subsaiddit\n\n";
    // For each subreddit retrieved, request some posts for that
    // and insert into the database under the correct table and
    // subsaiddit
    foreach($newSubsaiddits as &$subsaiddit) {

        echo "Getting posts for " . $subsaiddit['title'] . "\n";

        // Get posts for the sub-reddits
        $url = $base . "/r/" . $subsaiddit['title'] . "/.json";
        $response = file_get_contents($url);
        $response = json_decode($response);

        // Create an array of dictionaries for inserting into DB
        $item = array();
        $userItem = array();
        $newPosts = array();
        $newUsers = array();
        foreach ($response->data->children as &$post) {
            $item['title'] = clean($conn, $post->data->title);
            $item['author'] = clean($conn, $post->data->author);
            $item['subsaiddit'] = $subsaiddit['title'];
            $item['url'] = clean($conn, $post->data->url);
            $item['downvotes'] = $post->data->downs;
            $item['upvotes'] = $post->data->ups;
            array_push($newPosts, $item);
            // Add some new users while we're at it
            $userItem['username'] = clean($conn, $post->data->author);
            $userItem['password'] = hash('sha256', "default" . $salt);
            array_push($newUsers, $userItem);
        }
        
        echo "\tInserting into DB\n";
        echo "\tObjects: " . count($newPosts) . "\n";
        echo "\tNew Users: " . count($newUsers) . "\n";
        doInsert($conn, "accounts", $newUsers);
        doInsert($conn, "posts", $newPosts);

        // Add in new users to user array
        $users = array_merge($users, $newUsers);
    }

    echo "Friendship, subscribes and favourites, for everyone\n";

    foreach($users as &$user) {
        $numFriends = mt_rand(2, 50);
        $randomFriends = array_rand($users, $numFriends); 
        $newFriends = array();
        $friend = array();
        foreach($randomFriends as &$newFriend) {
            $friend['user_id'] = $user['username'];
            $friend['friend_id'] = $users[$newFriend]['username'];
            array_push($newFriends, $friend);
        }
        doInsert($conn, "friends", $newFriends);
    }
}

main();

?>

