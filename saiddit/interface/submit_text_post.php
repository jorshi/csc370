<?php
	$error = '';

	// Check to make sure the username and password fields have been filled
	if (isset($_POST['submit_text'])) {
		$title = ($_POST['title_text_form']);
		$author = getSessionUser();
	    $subsaiddit = ($_POST['subsaiddit_text_form']);
	    $text = ($_POST['text_text_form']);
	    
	        // Connection to mysql
	    $conn = db_connect();

	        // Check username and password against accounts
	    $query = sprintf(
            "INSERT INTO posts(title, author, subsaiddit, text) VALUES ('%s', '%s', '%s', '%s')",
            mysqli_real_escape_string($conn, $title),
            mysqli_real_escape_string($conn, $author),
            mysqli_real_escape_string($conn, $subsaiddit),
            mysqli_real_escape_string($conn, $text)
        );

	    $result = mysqli_query($conn, $query);
	        // Check for successful user look up
	    if (!$result) {
	        $error = sprintf("Query Failed: %s", mysql_error());
        }else {
	        header("location: ../homepage.php");
	    }

	    mysqli_close($conn);
	}
?>