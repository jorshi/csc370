<?php
   	include("../db_utils/connect.php");
    //checks to see if the session is started before starting it.

	$error = '';
	// Check to make sure the username and password fields have been filled
	if (isset($_POST['delete_post'])) {
		$post = $_POST['delete_post'];
	    // Connection to mysql
	    $conn = db_connect();
	    // Check username and password against accounts
	    $query = sprintf(
	        "DELETE FROM posts WHERE post_id = '%s'",
	        mysqli_real_escape_string($conn, $post)
	    );
	    $result = mysqli_query($conn, $query);
	    // Check for successful user look up
	    if (!$result) {
	        $error = sprintf("Query Failed: %s", mysql_error());
            echo $error;
        }
        else {
	        echo true;
	    }
	    mysqli_close($conn);
	}
?>