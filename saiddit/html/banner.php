<?php

function printBanner($user, $subsaiddit) {

    if ($subsaiddit == 'front') {
        $title = "Homepage";
    } else {
        $title = ucfirst(strtolower($subsaiddit));
    }
   
?>
    <div id='head'>
        <a>MY SUBSAIDDITS</a> <a>FRONT</a> <a>ALL</a> <a>RANDOM</a> | <a>ASKSAIDDIT</a> - <a>NEWS</a> - <a>VIDEOS</a> - <a>PICS</a> - <a>GAMING</a> - <a>WORLDNEWS</a> <a>MORE</a>

        <div id='nav_bar'> 
            <h1 class="nav-title">:) Saiddit</h1><span id="page-title" class="nav-title"><?php echo $title ?></span>
            <div id='login_button' value='0'></div>

            <?php
                if ($user != NULL) {
                    echo "<script>document.getElementById('login_button').innerHTML = \"<a href='#' onclick=''>".$user."</a> <a href='#' onclick=''>(#)</a> |     | <a href='#' onclick=''><b>preferences</b></a> | <a href='connect/logout.php'>logout</a> |\";</script>";
                    echo "<script>logged_in = true;</script>";
                }
                else{
                    echo "<script>document.getElementById('login_button').innerHTML = \"Want to join? <a href='#' onclick='div_show()'>Log in or sign up</a> in seconds. | English\";</script>";
                    echo "<script>logged_in = false;</script>";
                }
            ?>        
        </div>
    </div>
<?php
}
?>
