<?php

include('db_utils/connect.php');

session_start();
$error = '';

if (isset($_SESSION['login_user'])) {
    header("location: index.php");
}

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
                header("location: index.php");
            } else {
                $error = "Invalid username or password";
            }
        }

        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Saiddit Login</title>
        <link href="static/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="main">
            <h1>Saiddit Login</h1>
            <div id="login">
                <h2>Login Form</h2>
                <form action="" method="post">
                    <label>UserName :</label>
                    <input id="name" name="username" placeholder="username" type="text">
                    <label>Password :</label>
                    <input id="password" name="password" placeholder="**********" type="password">
                    <input name="submit" type="submit" value=" Login ">
                    <span><?php echo $error; ?></span>
                </form>
            </div>
        </div>
    </body>
</html>
