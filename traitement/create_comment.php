<?php
if(isset($_POST['comment-input'])) {
    if(!isset($_GET['post_id'])) {
        triggerDebugMessage('Impossible de commenter: l\'id du post n\'est pas renseignée.', false);
        header('Location: index.php');
    }

    $post_id = $_GET['post_id'];
    $feedback = comment($pdo, $_POST['comment-input'], $post_id);
    if(!$feedback)
        triggerDebugMessage('Votre commentaire n\'a pas été publié: erreur d\'insertion dans la base de données. Veuillez réessayer plus tard.', false);

} else {
    triggerDebugMessage('Impossible de publier le commentaire: le champ n\'est pas renseigné.', false);
}

header('Location:index.php');
?>
