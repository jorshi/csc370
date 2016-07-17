<?php

function printHead($user) {
?>
    <head>
        <title>Saiddit Homepage</title>
        <link href="static/css/style.css" rel="stylesheet" type="text/css">
        <link href="static/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="static/js/post_handler.js"></script>
        <script type="text/javascript" src="static/js/validateForm.js"></script>
        <script type="text/javascript" src="static/js/clearForm.js"></script>
        <script>
        	var logged_in = false;
            function div_show() {
                clearFormSaiddit();
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
            		location.href = 'interface/new_post.php';
            	}
            }
        </script>
    </head>
<?php
}
?>
