<?php
if(isset($_POST['newpost']) && isset($_POST['newpost-input'])) {
    $feedback = createPost($pdo, $_POST['newpost-input']);
} else {
    $feedback = '<div class="error-message">Impossible de publier le post.</div>';
}

header('Location:index.php');
?>
