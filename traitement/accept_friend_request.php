<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    if(!$ok=acceptFriendRequest($pdo, $id)) {
        echo 'toto';
        $_SESSION['info'] = '<p class="error-message">Impossible d\'accepter le demande d\'amitié. <a href="#">ok</a>';
    } else {
        header('Location: index.php');
    }

} else {
    echo 'Erreur: l\'id de l\'utilisateur ayant envoyé une demande d\'amitié n\'est pas renseignée.';
}

?>
