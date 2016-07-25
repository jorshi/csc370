<?php 
    include('connect.php');
    include('./../connect/user.php');

    $conn = db_connect();
    $user = getSessionUser();
    $subsaiddit = $_POST['subsaiddit'];
    
    if(isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];
        echo $action;
        switch($action) {
            case 'subscribe' : subscribe();break;
            case 'unsubscribe' : unsubscribe();break;
            // ...etc...
        }
    }
    
    function subscribe(){
        Global $conn, $subsaiddit;
        
        echo "subscribe";
	    // Check username and password against accounts
            $query = sprintf(
                "INSERT INTO subscribes(user_id, subsaid_id) VALUES ('%s', '%s');",
                mysqli_real_escape_string($conn, $_SESSION['login_user']),
                mysqli_real_escape_string($conn, $subsaiddit)
            );
            $result = mysqli_query($conn, $query);
            // Check for successful user look up
            if (!$result) {
                $error = sprintf("Query Failed: %s", mysql_error());
                echo $error;
            }
        //mysqli_close($conn);
    }
    function unsubscribe(){
        Global $conn, $subsaiddit;
        echo "unsubscribe";
	    // Check username and password against accounts
        
        $query = sprintf(
            "DELETE FROM subscribes WHERE user_id='%s' AND subsaid_id='%s'",
            mysqli_real_escape_string($conn, $_SESSION['login_user']),
            mysqli_real_escape_string($conn, $subsaiddit)
        );
        $result = mysqli_query($conn, $query);
        // Check for successful user look up
        if (!$result) {
            $error = sprintf("Query Failed: %s", mysql_error());
            echo $error;
        }
        
	    //mysqli_close($conn);
    }
?>
