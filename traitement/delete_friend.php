<?php

if(isset($_GET['id'])) {
    if(deleteFriend($pdo, $_GET['id'])) {
        header('Location: index.php');
    }
    triggerDebugMessage('Malheureusement, il semble qu\'il soit impossible de supprimer cet ami de la base de données pour le moment. Veuillez réessayer plus tard.', false);
} else {
    triggerDebugMessage('Impossible de retirer l\'utilisateur de la liste d\'amis: l\'id n\'est pas renseignée.', false);
}
?>
