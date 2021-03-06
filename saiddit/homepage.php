<?php
    include('db_utils/connect.php');
    include('db_utils/subsaiddit_factory.php');
    include('connect/login.php');
    include('connect/signup.php');
    include('connect/user.php');
    include('utility/logging.php');

    include('html/banner.php');
    include('html/head.php');
    include('html/main.php');
    include('html/footer.php');
    include('html/post_template.php');
    include('html/ads.php');

    $conn = db_connect();
    $user = getSessionUser();
    $request = $_GET;
    $error = NULL;
    $hidesubscribe = "hide";
    
    if (isset($request['s'])) {
        $subsaiddit = $request['s'];
        
        $conn = db_connect();
	    // Check username and subsaiddit to see if we've subscribed
        $query = sprintf(
            "SELECT 1 FROM subscribes WHERE user_id='%s' AND subsaid_id='%s'",
            mysqli_real_escape_string($conn, $user),
            mysqli_real_escape_string($conn, $subsaiddit)
        );
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result) > 0 ){ //if we are subscribed, use the text and css for unsubscribe
            $hidesubscribe = "unsubscribe";
        }else{
            $hidesubscribe = "subscribe";
        }
        
        if (!isSubsaiddit($conn, $subsaiddit))  {
            $error = "Subsaiddit does not exist";
            
            $subsaiddit = "front";
            $hidesubscribe = "hide"; //if it fails, hide subscribe button again
        }
    } else {
        $subsaiddit = "front";
        $hidesubscribe = "hide"; //hide the subscribe button on front and all
    }

    if ($subsaiddit == "random") {
        $subsaiddit = getRandom($conn);
    }
    if ($subsaiddit == "all" || $user == NULL){
        $hidesubscribe = "hide";
    } 
    
?>



<!DOCTYPE html>
<html>
	<style>
		#container1 {
		   width: 48px;
		   height: 48px;
		}

		#container1 img {
		   width: 100%;
		}
	</style>
    <!-- Print the page head. html/head.php -->
    <?php printHead($user); ?>

    <body>

        <!--MAIN [area where things that are not immediately on page will be (popups, etc)]-->
        <?php printMain($user); ?>

        <!--HEAD BANNER [the top area of page where headers, nav bar, etc. are]-->
        <?php printBanner($user, $subsaiddit, $conn, ''); ?>

        <!-- BODY [the area for saiddit and subsaiddit content and advertisement (like on reddit)]-->
            <div id='body' class="container-fluid">
                <div id='content'>
                    <div class="list-group"></div>
                </div>
                <?php printAds($user, ''); ?>
            </div>

        <!-- FOOT [as seen in reddit there is a bottom area with some links (just for show)]-->
        <?php printFooter($user); ?>

        <!-- POST TEMPLATE -->
        <?php printPostTemplate($user) ?>

        <input style="display:none" id="subsaiddit" value="<?php echo $subsaiddit ?>"/>
        <input style="display:none" id="hidesubscribe" value="<?php echo $hidesubscribe ?>"/>

    </body>
</html>



