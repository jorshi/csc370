<?php
function getSessionUser() {

    session_start();
    if (isset($_SESSION['login_user'])) {
        return $_SESSION['login_user'];
    }

    return NULL;
}

?>
