<?php
// Quick helper function for logging to stderr
function writeLog($arg) {
    ob_start();
    var_dump($arg);
    $output = ob_get_clean();
    $stderr = fopen('php://stderr', 'w');
    fwrite($stderr, $output);
}

?>
