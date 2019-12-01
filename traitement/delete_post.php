<?php

if(isset($_GET['post_id'])) {
    if(deletePost($pdo, $_GET['post_id'])) {
        echo '<div class="success-message">Le post a bien été supprimé.</div>';
        header('Location:index.php');
    } else {
        echo '<div class="error-message">mpossible de supprimer le post: erreur inconnue.</div>';
    }
} else {
    echo '<div class="error-message">Impossible de supprimer le post: l\'id n\'est pas renseignée.</div>';
}
