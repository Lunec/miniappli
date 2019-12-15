<?php
if(isset($_POST['newpost']) && isset($_POST['newpost-text'])) {

    if(isset($_GET['id'])) // If we're publishing on someone's wall, that someone's id is in the url
        $id = $_GET['id']; // else, we just publish on the connected user wall

    $args = array(
        'pdo'  => $pdo,
        'text' => $_POST['newpost-text'],
        'idAmi' => $id
    );

    if($_FILES["newpost-media"]["size"] != 0) { // If post image is to be uploaded
        $image = uploadPostImage();
        $args['image'] = $image;
    }

    $feedback = createPost($args);
    if(!$feedback) {
        triggerDebugMessage("Impossible de publier le post: erreur d'insertion dans la base de données. Veuillez réessayer plus tard.", false);
    }

} else {
    triggerDebugMessage('Impossible de publier le post.');
}

header('Location: index.php');
?>
