<?php
include('../connect/user.php');
include('../db_utils/post_factory.php');
include('../db_utils/connect.php');

$user = getSessionUser();
$conn = db_connect();
$subsaiddit = $_GET['subsaiddit'];

if ($subsaiddit == "front") {
    $posts = getHomepagePosts($conn, 0, 250, $user);
} else {
    $posts = getSubsaidditPosts($conn, 0, 250, $subsaiddit);
}
echo json_encode($posts);

?>
