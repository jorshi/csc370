<?php

function isSubsaiddit($conn, $name) {

    if ($name == "all" || $name == "random") {
        return true;
    }

    $query = sprintf(
        "SELECT * FROM subsaiddits WHERE title = '%s'",
        mysqli_real_escape_string($conn, $name)
    );

    $result = mysqli_query($conn, $query);

    // Only log user in if they are found
    if (mysqli_num_rows($result) > 0) {
        return true;
    }

    return false;
}


function getRandom($conn) {

    $query = "SELECT title FROM subsaiddits ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = $result->fetch_assoc();
        return $row['title'];
    }

    return NULL;
}
