<?php
    session_start();

    // Check to make sure the username and password fields have been filled
    if (isset($_POST['submit_reg'])) {
            // Check for a valid username and correct password
        $username = stripslashes($_POST['username_new']);
        $password = stripslashes($_POST['password_new']);
            // Connection to mysql
        $conn = db_connect();
        // Check username and password against accounts
        $query = sprintf(
            "INSERT INTO accounts(username, password) VALUES ('%s', SHA2('%s',256))",
            mysqli_real_escape_string($conn, $username),
            mysqli_real_escape_string($conn, $password)
        );

        $result = mysqli_query($conn, $query);
            // Check for successful user look up
        if (!$result) {
            $error = sprintf("Query Failed: %s", mysql_error());
        } else {
            $_SESSION['signup_user'] = $username;
        }
        mysqli_close($conn);
    }
?>