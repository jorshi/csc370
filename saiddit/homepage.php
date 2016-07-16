<?php
    include('db_utils/connect.php');
    include('connect/login.php');
    include('connect/signup.php');
    include('connect/user.php');
    include('utility/logging.php');

    $user = getSessionUser();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Saiddit Homepage</title>
        <link href="static/css/style.css" rel="stylesheet" type="text/css">
        <link href="static/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="static/js/post_handler.js"></script>
        <script>
        	var logged_in = false;
            function div_show() {
                var valid_names = ['valid_name', 'valid_password', 'valid_verpass', 'valid_user', 'valid_pass'];
                for (i=0;i<5;i++){
                    document.getElementById(valid_names[i]).innerHTML = " ";
                }
                document.getElementById('popup_main').style.overflow = 'scroll';
                document.getElementById('popup_main').style.display = 'block';
            }

            function div_hide(){
                document.getElementById('popup_main').style.display = 'none';
            }

            function add_new() {
            	if (!logged_in){
            		div_show();
            	}
            	else {
            		//new post form..
            	}
            }
        </script>
        <script type="text/javascript" src="static/js/validateForm.js"></script>
    </head>
    <body>

    <!--MAIN [area where things that are not immediately on page will be (popups, etc)]-->
        <div id='main'>
            <div id='popup_main'>
                <div id='block'>
                    <div id='close_popup_main' onclick ='div_hide()'></div>

                    <form id='register_form' name='register_form' action='' method='post' onsubmit='return validateForm("register_form", "username_new", "password_new", "verify_password")'>
                        <div class='title'>CREATE A NEW ACCOUNT</div>
                        <input type='text' id='username_new' name='username_new' placeholder='choose a username'>
                        <div class='valid' id='valid_name' style='top:42px; left:380px;'> </div>

                        <input type='text' id='password_new' name='password_new' placeholder='password'>
                        <div class='valid' id='valid_password' style='top:89px; left:380px;'> </div>

                        <input type='text' id='verify_password' name='verify_password' placeholder='verify password'>
                        <div class='valid' id='valid_verpass' style='top:138px; left:380px;'> </div>

                        <input type='text' id='email' name='email' placeholder='email (optional)'>
                        <br>
                        <br>
                        <input type='checkbox' id='remember_new'> remember me
                        <br>
                        <br>
                        <input type='checkbox' id='subscribe'> get the best of saiddit emailed to you once a week <a onclick=''>learn more</a>
                        <br>
                        <br>
                        <input type='submit' id='submit_reg' name='submit_reg' value='SIGN UP'>

                        <div class='error' id='error_reg' style='bottom:100px; left:30px'></div>
                    </form>

                    <div id='disclaimer'>By signing up, you agree to our <a>Terms</a> and that you have read our <a>Privacy Policy</a> and <a>Content Policy.</a> </div>
                    <div class='vr' style='top: 30px; right:50%; height:450px;'></div>

                    <form id='login_form' name='login_form' action='' method='post' onsubmit='return validateForm("login_form", "username", "password", 1)'>
                        <div class='title'>LOG IN</div>

                        <input type='text' id='username' name='username' placeholder='username'>
                        <div class='valid' id='valid_user' style='top:42px; right:40px;'> </div>

                        <input type='text' id='password' name='password' placeholder='password'>
                        <div class='valid' id='valid_pass' style='top:89px; right:40px'> </div>

                        <br>
                        <br>
                        <input type='checkbox' id='remember_new'> remember me <t> <a onclick='' style='position:absolute; right:30px;'>reset password</a>
                        <br>
                        <br>
                        <input type='submit' id='submit_login' name='submit_login' value='LOG IN'>

                        <div class='error' id='error_login' style='bottom:250px; right:30px'></div>
                    </form>
                </div>
            </div>
        </div>


<!--HEAD [the top area of page where headers, nav bar, etc. are]-->
        <div id='head'>
            <a>MY SUBSAIDDITS</a> <a>FRONT</a> <a>ALL</a> <a>RANDOM</a> | <a>ASKSAIDDIT</a> - <a>NEWS</a> - <a>VIDEOS</a> - <a>PICS</a> - <a>GAMING</a> - <a>WORLDNEWS</a> <a>MORE</a>

            <div id='nav_bar'>
                <h1>:) Saiddit Homepage</h1>
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


<!-- BODY [the area for saiddit and subsaiddit content and advertisement (like on reddit)]-->
        <div id='body'>
            <div id='content'>
                <div class="list-group"></div>
            </div>
            <div id='ads'>
            	<button class='new' id='new_link' >Submit a new link</button><br><br>
            	<button class='new' id='new_post' onclick='add_new()'>Submit a new text post</button>
            </div>
        </div>

<!-- FOOT [as seen in reddit there is a bottom area with some links (just for show)]-->
        <div id='foot'>
            <div class='extras' style='top:5px; left:5px;'>
                <a><h3>about</h3></a>
                <a>blog</a><br>
                <a>about</a><br>
                <a>source code</a><br>
                <a>advertise</a><br>
                <a>jobs</a>

            </div>

            <div class='vr' style='top:40px; left:160px; height:150px;'></div>

            <div class='extras' style='top:5px; left:160px;'>
                <a><h3>help</h3></a>
                <a>site rules</a><br>
                <a>FAQ</a><br>
                <a>wiki</a><br>
                <a>saiddiquette</a><br>
                <a>transparency</a><br>
                <a>contact us</a>
            </div>

            <div class='vr' style='top:40px; left:312px; height:150px;'></div>

            <div class='extras' style='top:5px; right:160px;'>
                <a><h3>apps and tools</h3></a>
                <a>Saiddit for iPhone</a><br>
                <a>Saiddit for Android</a><br>
                <a>mobile website</a><br>
                <a>buttons</a>
            </div>

            <div class='vr' style='top:40px; right:160px; height:150px;'></div>

            <div class='extras' style='top:5px; right:5px;'>
                <a><h3><3</h3></a>
                <a>saiddit gold</a><br>
                <a>saidditgifts</a>
            </div>
        </div>
        <div id='trademark'>Use of this site constitutes acceptance of our User Agreement and Privacy Policy (updated). © 2016 saiddit inc. All rights reserved. SAIDDIT and the smiley Logo are not registered trademarks of saiddit inc.</div>

<!-- POST TEMPLATE -->
        <div class="media panel panel-default post-template" style="display:none">
            <div class="media-left post-votes-wrapper">
                <span class="glyphicon glyphicon-chevron-up vote-glyph"></span>
                <span class="post-votes"></span>
                <span class="glyphicon glyphicon-chevron-down vote-glyph"></span>
            </div>
            <div class="media-left">
                <img class="media-object" src="static/img/lil_s.png" height="64" width="64">
            </div>
            <div class="media-body">
                <div class="media-heading">
                    <a href="#">
                        <h4 class="post-title"></h4>
                    </a>
                </div>
                <p class="media-left post-info"><p>
            </div>
        </div>
    </body>
</html>
