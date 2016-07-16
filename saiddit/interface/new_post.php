<?php
    include('../db_utils/connect.php');
    include('../connect/user.php');
    include('../utility/logging.php');

    $user = getSessionUser();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Saiddit Submit</title>
        <link href="../static/css/style.css" rel="stylesheet" type="text/css">
        <link href="../static/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="../static/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../static/js/post_handler.js"></script>

    </head>
    <body>

    <!--MAIN [area where things that are not immediately on page will be (popups, etc)]-->
        <div id='main'>
            
        </div>


<!--HEAD [the top area of page where headers, nav bar, etc. are]-->
        <div id='head'>
            <a>MY SUBSAIDDITS</a> <a>FRONT</a> <a>ALL</a> <a>RANDOM</a> | <a>ASKSAIDDIT</a> - <a>NEWS</a> - <a>VIDEOS</a> - <a>PICS</a> - <a>GAMING</a> - <a>WORLDNEWS</a> <a>MORE</a>

            <div id='nav_bar'>
                <h1>:) Saiddit Submit</h1>
                <div id='login_button' value='0'></div>

                <?php
			    	echo "<script>document.getElementById('login_button').innerHTML = \"<a href='#' onclick=''>".$user."</a> <a href='#' onclick=''>(#)</a> |     | <a href='#' onclick=''><b>preferences</b></a> | <a href='logout.php'>logout</a> |\";</script>";
			    	echo "<script>logged_in = true;</script>";
                ?>        
            </div>
        </div>


<!-- BODY [the area for saiddit and subsaiddit content and advertisement (like on reddit)]-->
        <div id='body'>
            <div id='content_submit'>
            	submit to saiddit

				<div class="container" style='width:80%; margin-left:0;'>
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#link">Link</a></li>
						<li><a data-toggle="tab" href="#text">Text</a></li>
					</ul>

					<div class="tab-content">
					    <div id="link" class="tab-pane fade in active">
						    <h3>Link</h3>
						   	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						
						<div id="text" class="tab-pane fade">
						    <h3>Text</h3>
						    <form id='post_text_form' name='post_text_form' action='' method='post' onsubmit=''>
								<div class='div_new_post' id='title_text_form'>
									title<br>
									<textarea rows='4' cols='90'></textarea>
								</div>
								<br>
								<div class='div_new_post' id='text_form'>
									text (optional)<br>
									<textarea rows='4' cols='90'></textarea>
								</div>
								<br>
								<div class='div_new_post' id='subsaiddit_form'>
									choose a subsaiddit<br>
									<textarea rows='4' cols='90'></textarea>
								</div>
								<br>
								<div class='div_new_post' id='options_text_form'>
									options<br>
									<input type='text'>

									<br>your subscribed subsaiddits
									<div id='subscribed'></div>
								</div>
							</form>
					    </div>
					</div>
				</div>
            </div>


            <div id='ads_submit'>
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
    </body>
</html>