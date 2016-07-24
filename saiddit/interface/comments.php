<?php
	include('../connect/user.php');
	include('../db_utils/connect.php');

	$user = getSessionUser();
	$conn = db_connect();

	if (isset($_POST['post'])) {
	    $post_id = $_POST['post'];

	    $query = sprintf(
	        "SELECT * from comments WHERE post_id = '%s'",
	        mysqli_real_escape_string($conn, $post_id)
	    );

	    $result = mysqli_query($conn, $query);

	    if (!$result) {
	        die('Query failed to execute for some reason');
	    }    
	}
	$text = array();
	$author = array();
	$time = array();
	while ($row = $result->fetch_assoc()) {
    	$text[] = $row['text'];
    	$author[] = $row['commentor_id'];
    	$time[] = $row['creation_time'];
    }
    $array = array($text, $author, $time);
    echo json_encode($array);
    mysqli_close($conn);
?>