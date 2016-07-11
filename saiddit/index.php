<?php
	include('connect/login.php');

	if (isset($_SESSION['login_user'])) {
	    header("location: profile.php");
	}

	if (isset($_SESSION['signup_user'])) {
	    header("location: profile.php");
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
