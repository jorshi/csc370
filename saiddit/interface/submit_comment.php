<?php
	include('../connect/user.php');
	include('../db_utils/connect.php');
	
	$error = '';
	// Check to make sure the username and password fields have been filled
	if (isset($_POST['submit_comment'])) {
		$text = ($_POST['comment_content']);
		$author = getSessionUser();
	    $post_id = ($_POST['post_id']);
	    $subsaiddit = ($_POST['subsaiddit_id']);
	    
	        // Connection to mysql
	    $conn = db_connect();

	        // Check username and password against accounts
	    $query = sprintf(
            "INSERT INTO comments(commentor_id, post_id, text) VALUES ('%s', '%s', '%s')",
            mysqli_real_escape_string($conn, $author),
            mysqli_real_escape_string($conn, $post_id),
            mysqli_real_escape_string($conn, $text)
        );

	    $result = mysqli_query($conn, $query);
	        // Check for successful user look up
	    if (!$result) {
	        $error = sprintf("Query Failed: %s", mysql_error());
        }else {
	        header("location: ../homepage.php?s=".$subsaiddit);
	    }

	    mysqli_close($conn);
	}
?>