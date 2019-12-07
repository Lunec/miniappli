<?php

if(isset($_GET['id'])) {
    if(deleteFriend($pdo, $_GET['id'])) {
        header('Location: index.php');
    }
    $_SESSION['info'] = "La requête SQL retirant l'ami de votre liste a retourné une erreur.";
} else {
    $_SESSION['info'] = 'Impossible de retirer l\'utilisateur de la liste d\'amis: l\'id n\'est pas renseignée.';
}
?>
