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

    <script type='text/javascript'>
    	function randomize_ads() {
    		var images = new Array("arrays.jpg","brothers.jpg","comsci_job.jpg","eat_more_chicken.jpg", "elven_king.jpg","escape.jpg","gillette.jpg","hoover.jpg", "people-nowadays.jpg","redbull.jpg","shaving.jpg","sleeping.jpg", "Thoreal.jpg","weight.jpg");
    		var imageNum = Math.floor(Math.random() * images.length);
    		var current_img = imageNum;
    		document.getElementById("ad1").src = "static/img/"+images[imageNum];

    		imageNum = Math.floor(Math.random() * images.length);
    		while (imageNum == current_img){
    			imageNum = Math.floor(Math.random() * images.length);    			
    		}
    		current_img = imageNum;
    		document.getElementById("ad2").src = "static/img/"+images[imageNum];

    		imageNum = Math.floor(Math.random() * images.length);

    		while (imageNum == current_img){
    			imageNum = Math.floor(Math.random() * images.length);		
    		}
    		current_img = imageNum;
    		document.getElementById("ad3").src = "static/img/"+images[imageNum];
    	}
    	window.onload = randomize_ads;
    </script>
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
                
                <div id='ads'>
                	<div style='width:100%; height:200px; border:1px solid grey'>
 						<img id='ad1' src="" alt="" width='100%' height='100%' style='z-index:99;'>
 						<center><a onclick='alert("This isnt a real ad...")'>discuss this ad on saiddit</a></center>
                	</div>
                    <br>
                	<br>
                    <button class=<?php echo $hidesubscribe ?> id='subscribe_button' onclick='subscribeTo($(this))'><?php echo $hidesubscribe ?></button><br><br>
                	<br>
                	<br>
                    <button class='new' id='new_link' onclick='add_new("link")'>Submit a new link</button>
                    <br>
                    <br>
                    <button class='new' id='new_post' onclick='add_new("text")'>Submit a new text post</button>
                    <br>
                    <br>
                    <button class='new' id='new_post' onclick='add_new("subsaiddit")'>Create your own Subsaiddit!</button>
                    <br>
                    <br>
                    <br>
                    <div style='width:100%; height:300px; border:1px solid grey'>
 						<img id='ad2' src="" alt="" width='100%' height='100%' style='z-index:99;'>
 						<center><a onclick='alert("This isnt a real ad...")'>discuss this ad on saiddit</a></center>
                	</div>
                	<br>
                	<br>
                	<div style='width:100%; height:300px; border:1px solid grey'>
 						<img id='ad3' src="" alt="" width='100%' height='100%' style='z-index:99;'>
 						<center><a onclick='alert("This isnt a real ad...")'>discuss this ad on saiddit</a></center>
                	</div>
                </div>
            </div>

        <!-- FOOT [as seen in reddit there is a bottom area with some links (just for show)]-->
        <?php printFooter($user); ?>

        <!-- POST TEMPLATE -->
        <?php printPostTemplate($user) ?>

        <input style="display:none" id="subsaiddit" value="<?php echo $subsaiddit ?>"/>
        <input style="display:none" id="hidesubscribe" value="<?php echo $hidesubscribe ?>"/>

    </body>
</html>



