<?php

include('db_utils/connect.php');

session_start();
$error = '';

// Check to make sure the username and password fields have been filled
if (isset($_POST['submit'])) {
    if(empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Both username and password must be filled";
    } else {

        // Check for a valid username and correct password
        $username = stripslashes($_POST['username']);
        $password = stripslashes($_POST['password']);

        // Connection to mysql
        $conn = db_connect();

        // Check username and password against accounts
        $query = sprintf(
            "SELECT * FROM accounts WHERE username = '%s' AND password = SHA2('%s', 256)",
            mysqli_real_escape_string($conn, $username),
            mysqli_real_escape_string($conn, $password)
        );

        $result = mysqli_query($conn, $query);
        
        // Check for successful user look up
        if (!$result) {
            $error = sprintf("Query Failed: %s", mysql_error());
        } else {
            $rows = mysqli_num_rows($result);

            // If user was found then log them in and store user session
            if ($rows == 1) {
                $_SESSION['login_user'] = $username;
                header("locaion: profile.php");
            } else {
                $error = "Invalid username or password";
            }
        }

        mysqli_close($conn);
    }
}
?>
