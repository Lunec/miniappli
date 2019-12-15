<?php

if(isset($_GET['id'])) {
    deleteFriend($pdo, $_GET['id']);
    header('Location: index.php');
} else {
    triggerDebugMessage('Impossible de retirer l\'utilisateur de la liste d\'amis: l\'id n\'est pas renseignée.', false);
}
?>
