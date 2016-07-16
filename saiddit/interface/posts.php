<?php
include('../connect/user.php');
include('../db_utils/post_factory.php');
include('../db_utils/connect.php');

$user = getSessionUser();
$conn = db_connect();
$request = $GET;

$posts = getHomepagePosts($conn, 0,250, $user);
echo json_encode($posts);

?>
