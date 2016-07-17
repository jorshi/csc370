<?php

function isSubsaiddit($conn, $name) {

    $query = sprintf(
        "SELECT * FROM subsaiddits WHERE title = '%s'",
        mysqli_real_escape_string($conn, $name)
    );

    $result = mysqli_query($conn, $query);

    if (!$result) {
        $error = sprintf("Query Failed: %s", mysql_error());
    } else {
        $_SESSION['login_user'] = $username;
        header("location: homepage.php");
    }
