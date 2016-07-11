<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Saiddit</title>
        <link href="static/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="main">
            <h1>Saiddit Login</h1>
            <?php
                if(isset($_SESSION['login_user'])) {
                    echo "<a href='logout.php'>logout</a>";
                } else {
                    echo "<a href='login.php'>login</a>";
                }
            ?>
        </div>
    </body>
</html>
