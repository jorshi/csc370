<?php
	$error = '';

	// Check to make sure the username and password fields have been filled
	if (isset($_POST['submit_subsaiddit'])) {
		$title = ($_POST['title_subsaiddit_form']);
		$description = ($_POST['description_subsaiddit_form']);
		$author = getSessionUser();
	    
	        // Connection to mysql
	    $conn = db_connect();

	        // Check username and password against accounts
	    $query = sprintf(
            "INSERT INTO subsaiddits(title, description, creator_key) VALUES ('%s', '%s', '%s')",
            mysqli_real_escape_string($conn, $title),
            mysqli_real_escape_string($conn, $description),
            mysqli_real_escape_string($conn, $author)
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