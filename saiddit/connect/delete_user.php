<?php
   	include("../db_utils/connect.php");
	include('../connect/user.php');
    //checks to see if the session is started before starting it.

	$error = '';
	$var = '';
	
    $username = getSessionUser();//checks to see if the session is started before starting it.

	$error = '';
	// Check to make sure the username and password fields have been filled
	if (isset($_POST['delete_account'])) {

	    // Connection to mysql
	    $conn = db_connect();
	    // Check username and password against accounts
	    $query = sprintf(
	        "DELETE FROM accounts WHERE username = '%s'",
	        mysqli_real_escape_string($conn, $username)
	    );
	    $result = mysqli_query($conn, $query);
	    // Check for successful user look up
	    if (!$result) {
	        $error = sprintf("Query Failed: %s", mysql_error());
            echo $error;
        }
        else {
            session_destroy();
	        header("location: ../homepage.php");
	    }
	    mysqli_close($conn);
	}
?>