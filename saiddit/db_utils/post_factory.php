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
            mysqli_real_escape_string($conn, implode("','", $subscribes))
        );
    } else {
        $query = sprintf(
            "SELECT * FROM posts ORDER BY publish_time LIMIT %s,%s",
            mysqli_real_escape_string($conn, $start),
            mysqli_real_escape_string($conn, $num)
        );
    }

    return queryPosts($conn, $query);
}

function getSubsaidditPosts($conn, $start, $num, $subsaiddit) {

    if ($subsaiddit == "all") {
        $where = "";
    } else {
        $where = sprintf("WHERE subsaiddit = '%s'",  mysqli_real_escape_string($conn, $subsaiddit));
    }

    $query = sprintf(
        "SELECT * FROM posts %s ORDER BY publish_time", $where
    );

    return queryPosts($conn, $query);
}
