<?php

include("navigation.php");

function printBanner($user, $subsaiddit, $conn=NULL,$dir) {

    if ($subsaiddit == 'front') {
        $title = "Homepage";
    } else {
        $title = ucfirst(strtolower($subsaiddit));
    }

?>
    <div id='head'>
<!-- Old nav
        <a>MY SUBSAIDDITS</a> <a href="homepage.php">FRONT</a> <a href="homepage.php?s=all">ALL</a> <a href="homepage.php?s=random">RANDOM</a> | <a>ASKSAIDDIT</a> - <a>NEWS</a> - <a>VIDEOS</a> - <a>PICS</a> - <a>GAMING</a> - <a>WORLDNEWS</a> <a>MORE</a>
-->
        <?php printNavigation($conn, $dir, $user) ?>
        <div id='nav_bar' class="container-fluid">
            <?php echo '<a href = "'.$dir.'homepage.php" ><h1 class="nav-title" style="color:black;">:) Saiddit</h1><a><span id="page-title" class="nav-title" style="color:black;">'.$title.'</span>';?>
            <div id='login_button' value='0'></div>

            <?php
                if ($user != NULL) {
                    echo "<script>document.getElementById('login_button').innerHTML = \"<a href='#'>".$user."</a> <a href='#'>(0)</a> |     | <a href='#'><b>preferences</b></a> | <a href='connect/logout.php'>logout</a> | <a href='#' onclick='div_show_settings()'>account settings</a> |\";</script>";
                    echo "<script>logged_in = true;</script>";
                }
                else{
                    echo "<script>document.getElementById('login_button').innerHTML = \"Want to join? <a href='#' onclick='div_show()'>Log in or sign up</a> in seconds. | <a><b>English</b></a>\";</script>";
                    echo "<script>logged_in = false;</script>";
                }
            ?>
        </div>
    </div>
<?php
}
?>
