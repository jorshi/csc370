<?php
    include('../db_utils/connect.php');
    include('../connect/user.php');
    include('../utility/logging.php');
    
    include('./../html/banner.php');
    include('./../html/head.php');
    include('./../html/main.php');
    include('./../html/footer.php');
    include('./../html/post_template.php');

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
    <!-- Print the page head. html/head.php -->
    <?php printHead($user); ?>

    <body>

        <!--MAIN [area where things that are not immediately on page will be (popups, etc)]-->
        <?php printMain($user); ?>

        <!--HEAD BANNER [the top area of page where headers, nav bar, etc. are]-->
        <?php printBanner($user, $subsaiddit); ?>
        

        <!-- BODY [the area for saiddit and subsaiddit content and advertisement (like on reddit)]-->
            <div id='body'>
            <div id='content_submit'>
            	<h3 style='text-align:left;'>create a saiddit</h3>

				<div class="container" style='width:80%; margin-left:0;'>
					<ul class="nav nav-tabs">
						
						
					</ul>

					<div class="tab-content">
					    <div id="link" class="tab-pane fade in active">

						    <form id='post_link_form' name='post_link_form' action='' method='post' onsubmit=''>
                                <div class='div_new_post' id='title_text_form'>
                                    <h4>name</h4>
                                    <p>no spaces, e.g., "books" or "bookclub". avoid using solely trademarked names, <br>
                                    e.g. use "FansOfAcme" instead of "Acme". once chosen, this name cannot be changed.</p>
                                    <textarea rows='4' cols='97' required='required'></textarea>
                                </div>
                                
                                <br>
                                <div class='div_new_post' id='title_text_form'>
                                    <h4>title</h4>
                                    <p>e.g., books: made from trees or pixels. recommendations, news, or thoughts</p>
                                    <textarea rows='4' cols='97' required='required'></textarea>
                                </div>
                                
                                <br>
                                <div class='div_new_post' id='title_text_form'>
                                    <h4>description</h4>
                                    <p>Appears in search results and social media links. 500 characters max.</p>
                                    <textarea rows='4' cols='97' required='required'></textarea>
                                    <br> your subscribed subsaiddits
                                </div>
                                
                                <br>
                                <div class='div_new_post' id='title_text_form'>
                                    <h4>sidebar</h4>
                                    <p>shown in the sidebar of your subreddit. 5120 characters max.</p>
                                    <textarea rows='4' cols='97' required='required'></textarea>
                                    <br> your subscribed subsaiddits
                                </div>
                                    
                                <br>
                                <div class='div_new_post' id='title_text_form'>
                                    <h4>submission text </h4>
                                    <p>text to show on submission page. 1024 characters max.</p>
                                    <textarea rows='4' cols='97' required='required'></textarea>
                                </div>
                                <input type='submit' value='submit' id='link_submit' style='position:relative; left:0px;'>                  
                            </form>
						</div>
						
						<div id="text" class="tab-pane fade">
                            <br>
						    <div id= 'warning_new_post'>
                                You are submitting a text-based post. Speak your mind. A title is required, but expanding further in the text field is not. Beginning your title with "vote up if" is violation of intergalactic law.
                            </div>
						    </br>
                            
                            <form id='post_text_form' name='post_text_form' action='' method='post' onsubmit=''>
								<div class='div_new_post' id='title_text_form'>
                                    <h4>title</h4><br>
                                    <textarea rows='4' cols='97' required='required'></textarea>
                                </div>
								<br>
                                <div class='div_new_post' id='title_text_form'>
                                    <h4>text (optional)</h4><br>
                                    <textarea rows='4' cols='97'></textarea>
                                    <div style='position:absolute; right:5px; top:5px;'><a href='#'>content policy</a><t> <a href='#'>formatting help</a></div>
                                </div>
								<br>
								<div class='div_new_post' id='title_text_form'>
                                    <h4>choose a subsaiddit</h4><br>
                                    <textarea rows='4' cols='97' required='required'></textarea>
                                    <br> your subscribed subsaiddits
                                </div>
								
                                <br>
								<div class='div_new_post' id='options_text_form'>
									<h4>options</h4><br>
									<input type='checkbox'> Send replies to my inbox			
								</div>
                                <br>

                                <div class='div_new_post' style='background-color:#E3EDFA; '>
                                    please be mindful of saiddit's <a href='#'><b>content policy</b></a> and practice <a href='#'><b>good saiddiquette</b></a>        
                                </div>
                                <br>

                                <input type='submit' value='submit' id='text_submit' style='position:relative; left:0px;'>    
							</form>
					    </div>
					</div>
				</div>
            </div>


            <div id='ads_submit'>
            </div>
        </div>


            <div id='ads_submit'>
            </div>
        </div>

        <!-- FOOT [as seen in reddit there is a bottom area with some links (just for show)]-->
        <?php printFooter($user); ?>

        <!-- POST TEMPLATE -->
        <?php printPostTemplate($user) ?>

        <input style="display:none" id="subsaiddit" value="<?php echo $subsaiddit ?>"/>

    </body>
</html>