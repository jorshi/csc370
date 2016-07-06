<?php

// Function for connecting to the saiddit database
function db_connect() {

    $host = "127.0.0.1";
    $user = "saiddit_sys";
    $pass = "";
    $db = "saiddit";
    $post = 3306;

    // Connect to mysql using subsaiddit_sys user
    $connection = mysqli_connect($host, $user, $pass, $db, $port) or die (mysql_error());

    return $connection;
}

?>
