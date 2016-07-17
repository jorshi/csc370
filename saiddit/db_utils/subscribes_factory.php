<?php

function getUserSubscribes($conn, $user) {

    if ($conn == NULL) {
        $conn = db_connect();
    }

    $query = sprintf(
        "SELECT subsaid_id from subscribes WHERE user_id = '%s'",
        $user
    );

    $result = mysqli_query($conn, $query);
    $subscribes = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($subscribes, $row['subsaid_id']);
        }
    }

    return $subscribes;
}
?>
