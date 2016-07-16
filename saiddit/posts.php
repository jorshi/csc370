<?php
include('connect/user.php');
include('db_utils/post_factory.php');

$user = getSessionUser();
$request = $GET;

if ($user == NULL) {
    $posts = getHomepagePosts(0,250);
    echo json_encode($posts);
}

?>
