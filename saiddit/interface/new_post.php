<?php
    include('../db_utils/connect.php');
    include('../connect/user.php');
    include('../utility/logging.php');
    include('../interface/submit_text_post.php');
    include('../interface/submit_url_post.php');

    include('../html/footer.php');
    $user = getSessionUser();
    $title = 'new post';
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
                <a href='homepage.php'><h1>:) Saiddit Submit</h1></a>
                <div id='login_button'></div>

                <?php
			    	echo "<script>document.getElementById('login_button').innerHTML = \"<a href='#' onclick=''>".$user."</a> <a href='#' onclick=''>(#)</a> |     | <a href='#' onclick=''><b>preferences</b></a> | <a href='logout.php'>logout</a> |\";</script>";
                ?>        
            </div>
        </div>

<!-- BODY [the area for saiddit and subsaiddit content and advertisement (like on reddit)]-->
        <div id='body'>
            <div id='content_submit'>
            	<h3 style='text-align:left;'>submit to saiddit</h3>

				<div class="container" style='width:65%; margin-left:0;'>
					<ul class="nav nav-tabs">
						<li id= "link_li" class="active"><a  data-toggle="tab" href="#link">Link</a></li>
						<li id= "text_li" class=""><a  data-toggle="tab" href="#text">Text</a></li>
					</ul>

					<div class="tab-content">
					    <div id="link" class="tab-pane fade in active">
                            <br>
                            <div id= 'warning_new_post'>
                                You are submitting a link. The key to a successful submission is interesting content and a descriptive title.
                            </div>
                            </br>

						    <form id='post_link_form' name='post_link_form' action='' method='post'>
                                <div class='div_new_post' >
                                    <h3 style='text-align:left;'>url</h3><br>
                                    <textarea class='textarea_form' rows='4' id='url_link_form' name='url_link_form' cols='97' required='required'></textarea>
                                </div>
                                
                                <br>
                                <div class='div_new_post' >
                                    <h3 style='text-align:left;'>title</h3><br>
                                    <textarea class='textarea_form' rows='4' id='title_link_form' name='title_link_form' cols='97' required='required'></textarea>
                                </div>
                                
                                <br>
                                <div class='div_new_post' >
                                    <h3 style='text-align:left;'>choose a subsaiddit</h3><br>
                                    <textarea class='textarea_form' rows='4' id='subsaiddit_link_form' name='subsaiddit_link_form' cols='97' required='required'></textarea>
                                    <br> your subscribed subsaiddits
                                </div>
                                
                                <br>
                                <div class='div_new_post' >
                                    <h3 style='text-align:left;'>options</h3><br>
                                    <input type='checkbox' id='options_link_form' name='options_link_form'> Send replies to my inbox            
                                </div>
                                <br>
                                <input type='submit' value='submit' id='submit_link' name='submit_link' style='position:relative; left:0px;'>                  
                            </form>
						</div>
						
						<div id="text" class="tab-pane fade">
                            <br>
						    <div id= 'warning_new_post'>
                                You are submitting a text-based post. Speak your mind. A title is required, but expanding further in the text field is not. Beginning your title with "vote up if" is violation of intergalactic law.
                            </div>
						    </br>
                            
                            <form id='post_text_form' name='post_text_form' action='' method='post'>
								<div class='div_new_post'>
                                    <h3 style='text-align:left;'>title</h3><br>
                                    <textarea class='textarea_form' id='title_text_form' name='title_text_form' rows='4' cols='97' required='required'></textarea>
                                </div>
								<br>
                                <div class='div_new_post' >
                                    <h3 style='text-align:left;'>text (optional)</h3><br>
                                    <textarea class='textarea_form' id='text_text_form' name='text_text_form' rows='4' cols='97'></textarea>
                                    <div style='position:absolute; right:5px; top:5px;'><a href='#'>content policy</a><t> <a href='#'>formatting help</a></div>
                                </div>
								<br>
								<div class='div_new_post' >
                                    <h3 style='text-align:left;'>choose a subsaiddit</h3><br>
                                    <textarea class='textarea_form' id='subsaiddit_text_form' name='subsaiddit_text_form' rows='4' cols='97' required='required'></textarea>
                                    <br> your subscribed subsaiddits
                                </div>
								
                                <br>
								<div class='div_new_post' >
									<h3 style='text-align:left;'>options</h3><br>
									<input type='checkbox' id='options_text_form' name='options_text_form'> Send replies to my inbox			
								</div>
                                <br>

                                <div class='div_new_post' style='background-color:#E3EDFA; '>
                                    please be mindful of saiddit's <a href='#'><b>content policy</b></a> and practice <a href='#'><b>good saiddiquette</b></a>        
                                </div>
                                <br>

                                <input type='submit' value='submit' id='submit_text' name='submit_text' style='position:relative; left:0px;'>    
							</form>
					    </div>
					</div>
				</div>
            </div>


            <div id='ads_submit'>
            </div>
        </div>

<!-- FOOT [as seen in reddit there is a bottom area with some links (just for show)]-->
            <?php printFooter($user); ?>
        <script>
            var i = parent.document.URL.substring(parent.document.URL.indexOf('var='), parent.document.URL.length);
            var submit_type = i.substr(i.length - 4);

            //var button = document.getElementById('li')
            if (submit_type == 'link') {
                document.getElementById('link_li').className = "active";
                document.getElementById('text_li').className = "";

                document.getElementById('link').className = "tab-pane fade in active";
                document.getElementById('text').className = "tab-pane fade";
            }else {
                document.getElementById('text_li').className = "active";
                document.getElementById('link_li').className = "";

                document.getElementById('text').className = "tab-pane fade in active";
                document.getElementById('link').className = "tab-pane fade";
            }
        </script>
    </body>

        
</html>