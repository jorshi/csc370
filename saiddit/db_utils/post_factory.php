<?php

include('../utility/logging.php');
include('subscribes_factory.php');


// Do query and return the list of posts
function queryPosts($conn, $query) {

    $result = mysqli_query($conn, $query);
    $posts = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $row['vote_total'] = $row['upvotes'] - $row['downvotes'];
            array_push($posts, $row);
        }
    }

    return $posts;
}


function getHomepagePosts($conn, $start, $num, $user) {

    if ($user != NULL) {
        $subscribes = getUserSubscribes($conn, $user);
        $query = sprintf(
            "SELECT * from posts WHERE subsaiddit IN ('%s') ORDER BY publish_time",
            implode("','", $subscribes)
        );
        writeLog($query);
    }

    $query = sprintf(
        "SELECT * FROM posts ORDER BY publish_time LIMIT %s,%s",
        $start,
        $num
    );

    return queryPosts($conn, $query);
}
