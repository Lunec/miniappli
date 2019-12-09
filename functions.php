<?php

function triggerDebugMessage($message, $type=false) {
    $type == true ? $message = '<div class="success-message">' . $message : $message = '<div class="error-message">' . $message;
    $message .= '<a href="index.php">OK</a></div>';
    $_SESSION['info'] = $message;
}
