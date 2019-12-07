<?php
if(isset($_POST['newpost']) && isset($_POST['newpost-text'])) {
    $id = $_SESSION['id'];

    if(isset($_GET['id'])) // If we're publishing on someone's wall, that someone's id is in the url
        $id = $_GET['id']; // else, we just publish on the connected user wall

    $feedback = createPost($pdo, $_POST['newpost-text'], $id);
} else {
    $feedback = '<div class="error-message">Impossible de publier le post.</div>';
}

header('Location:index.php');
?>
