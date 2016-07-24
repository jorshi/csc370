<?php
	include("../db_utils/connect.php");
	include('../connect/user.php');
    //checks to see if the session is started before starting it.

	$error = '';
	$var = '';
	
    $current_user = getSessionUser();
    //echo $current_user;
	// Check to make sure the username and password fields have been filled
	if (isset($_POST['submit_changes'])) {
	    // Connection to mysql
	    $conn = db_connect();

		if ($_POST['username_change'] != null || $_POST['username_change'] != '') {
	    	$username = stripslashes($_POST['username_change']);
		    $query = sprintf(
			    "UPDATE accounts SET username = '%s' WHERE username = '%s'",
			    mysqli_real_escape_string($conn, $username),
			    mysqli_real_escape_string($conn, $current_user)
			);
			$result = mysqli_query($conn, $query);
		    // Check for successful user look up
		    if (!$result) {
		        $error = sprintf("Query Failed: %s", mysql_error());
	        }
	        else {
	        	$_SESSION['login_user'] = $username;
			}  
	    }
	    else if (($_POST['username_change'] == null || $_POST['username_change'] == '') && ($_POST['password_change'] != null || $_POST['password_change'] != '')) {
	    	$password = stripslashes($_POST['password_change']);
   			$password = $password."somesortofsalt";
	    	$query = sprintf(
		        "UPDATE accounts SET password = SHA2('%s', 256) WHERE username = '%s'",
		        mysqli_real_escape_string($conn, $password),
		        mysqli_real_escape_string($conn, $current_user)
		    );
		    

			$result = mysqli_query($conn, $query);
		    // Check for successful user look up
		    if (!$result) {
		        $error = sprintf("Query Failed: %s", mysql_error());
	        }
	        else {
	        	$_SESSION['login_user'] = $current_user;
			}
	    }
	    else {
	    	$username = stripslashes($_POST['username_change']);
	    	$password = stripslashes($_POST['password_change']);
   			$password = $password."somesortofsalt";
	    	$query = sprintf(
		        "UPDATE accounts SET username = '%s', password = SHA2('%s', 256) WHERE username = '%s'",
		        mysqli_real_escape_string($conn, $username),
		        mysqli_real_escape_string($conn, $password),
		        mysqli_real_escape_string($conn, $current_user)
		    );
		    $result = mysqli_query($conn, $query);
		    if (!$result) {
		        $error = sprintf("Query Failed: %s", mysql_error());
	        }
	        else {
	        	$_SESSION['login_user'] = $username;
			}
	    }
	    header("location: ../homepage.php");
	    mysqli_close($conn);    
    }	
?>
