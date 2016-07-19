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
            "SELECT * from posts WHERE subsaiddit IN ('%s') ORDER BY (upvotes - downvotes) LIMIT %s,%s",
            implode("','", $subscribes),
            $start,
            $num
        );
        writeLog($query);
    } else {
        $query = sprintf(
            "SELECT p.* FROM posts p JOIN subsaiddits s on p.subsaiddit = s.title WHERE s.front_page=1 ORDER BY (p.upvotes - p.downvotes) DESC LIMIT %s,%s",
            mysqli_real_escape_string($conn, $start),
            mysqli_real_escape_string($conn, $num),
            $start,
            $num
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
        "SELECT * FROM posts %s ORDER BY (upvotes - downvotes) DESC", $where
    );

    return queryPosts($conn, $query);
}
