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
            <br>
            <div id='content_submit'>
            	<h3 style='text-align:left;'>create a saiddit</h3>

				<div class="container" style='width:80%; margin-left:0;'>
					<ul class="nav nav-tabs">
						
						
					</ul>

					<div class="tab-content">
					    <div id="link" class="tab-pane fade in active">

						    <form id='post_link_form' name='post_link_form' action='' method='post' onsubmit=''>
                                
                                <br>
                                <div class='div_new_post' id='title_text_form'>
                                    <h4>title</h4>
                                    <p>e.g., books: made from trees or pixels. recommendations, news, or thoughts</p>
                                    <textarea rows='1' cols='97' required='required'></textarea>
                                </div>
                                
                                <br>
                                <div class='div_new_post' id='title_text_form'>
                                    <h4>description</h4>
                                    <p>Appears in search results and social media links. 500 characters max.</p>
                                    <textarea rows='3' cols='97' required='required'></textarea>
                                    <br> your subscribed subsaiddits
                                </div>
                                    
                                <br>
                                <div class='div_new_post' id='options_text_form'>
                                    <h4>frontpage</h4><br>
                                    <input type='checkbox'> Is this a frontpage subsaiddit?           
                                </div>                 
                            </form>
						</div>
						
					</div>
				</div>
            </div>


            <div id='ads_submit'>
            </div>
        </div>
        </div>

        <!-- FOOT [as seen in reddit there is a bottom area with some links (just for show)]-->
        <?php printFooter($user); ?>

        <!-- POST TEMPLATE -->
        <?php printPostTemplate($user) ?>

        <input style="display:none" id="subsaiddit" value="<?php echo $subsaiddit ?>"/>

    </body>
</html>