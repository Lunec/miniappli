<?php

/* TRAITEMENT : INVITER UN AMI */

if(isset($_GET['id'])) {
    $friendRequest = sendFriendRequest($pdo, $_GET['id']);
    if($friendRequest) { // Si tout s'est bien passé
        header('Location: index.php');
    } else {
        echo '<p class="error-message">Impossible d\'envoyer une demande d\'amitié à cet utilisateur.<a href="index.php">ok</a></p>';
    }
}

?>
