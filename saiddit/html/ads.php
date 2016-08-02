<?php
function printAds($user, $dir) {
    echo "<script>var dir = '".$dir."';</script>"
?>
    <script type='text/javascript'>
        function randomize_ads() {
            var images = new Array("arrays.jpg","brothers.jpg","comsci_job.jpg","eat_more_chicken.jpg", "elven_king.jpg","escape.jpg","gillette.jpg","hoover.jpg", "people-nowadays.jpg","redbull.jpg","shaving.jpg","sleeping.jpg", "Thoreal.jpg","weight.jpg");
            var imageNum = Math.floor(Math.random() * images.length);
            var current_img = imageNum;
            document.getElementById("ad1").src = dir+"static/img/"+images[imageNum];

            imageNum = Math.floor(Math.random() * images.length);
            while (imageNum == current_img){
                imageNum = Math.floor(Math.random() * images.length);               
            }
            current_img = imageNum;
            document.getElementById("ad2").src = dir+"static/img/"+images[imageNum];

            imageNum = Math.floor(Math.random() * images.length);

            while (imageNum == current_img){
                imageNum = Math.floor(Math.random() * images.length);       
            }
            current_img = imageNum;
            document.getElementById("ad3").src = dir+"static/img/"+images[imageNum];
        }
        window.onload = randomize_ads;
    </script>

    <div id='ads'>
    	<div style='width:100%; height:200px; border:1px solid grey'>
    		<img id='ad1' src="" alt="" width='100%' height='100%' style='z-index:99;'>
    		<center><a onclick='alert("This isnt a real ad...")'>discuss this ad on saiddit</a></center>
    	</div>

        <br>
    	<br>

        <button class=<?php echo $hidesubscribe ?> id='subscribe_button' onclick='subscribeTo($(this))'><?php echo $hidesubscribe ?></button>
        
        <br>
        <br>
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
<?php
}
?>