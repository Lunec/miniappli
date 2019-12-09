<?php
if(isset($_POST['newpost']) && isset($_POST['newpost-text'])) {
    $id = $_SESSION['id'];

    if(isset($_GET['id'])) // If we're publishing on someone's wall, that someone's id is in the url
        $id = $_GET['id']; // else, we just publish on the connected user wall

    $feedback = createPost($pdo, $_POST['newpost-text'], $id);
    if(!$feedback) {
        triggerDebugMessage("Impossible de publier le post: erreur d'insertion dans la base de données. Veuillez réessayer plus tard.", false);
    }
} else {
    triggerDebugMessage('Impossible de publier le post.', false);
}

header('Location: index.php');
?>
