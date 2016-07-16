<?php

include('connect.php');
include('logging.php');

function getHomepagePosts($start, $num) {

    $conn = db_connect();
    $query = sprintf(
        "SELECT * FROM posts LIMIT %s,%s",
        $start,
        $num
    );
    $result = mysqli_query($conn, $query);
    $posts = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($posts, $row);
        }
    }

    return $posts;
}
