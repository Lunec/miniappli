<?php
if(isset($_POST['newpost']) && isset($_POST['newpost-text'])) {
    $id = $_SESSION['id'];

    if(isset($_GET['id'])) // If we're publishing on someone's wall, that someone's id is in the url
        $id = $_GET['id']; // else, we just publish on the connected user wall

    if(!isset($_FILES['newpost-media'])) { // If post image is to be uploaded
        $feedback = createPost($pdo, $id, $_POST['newpost-text']);
        if(!$feedback) {
            triggerDebugMessage("Impossible de publier le post: erreur d'insertion dans la base de données. Veuillez réessayer plus tard.", false);
        }
    } else {
        $image = uploadPostImage();

        if(is_array($image)) {
            triggerDebugMessage('Impossible de publier l\'image. '.$image['erreur']);
        } else {
            $feedback = createPostWithImage($pdo, $id, $_POST['newpost-text'], $image);
        }
    }

} else {
    triggerDebugMessage('Impossible de publier le post.');
}

header('Location: index.php');
?>
