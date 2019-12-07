<?php

/*
    Fil d'actualité
    - Permet de publier un post
    - Affiche tous les posts de l'utilisateur connecté et ses amis,
      par date décroissante
*/

if(!isset($_SESSION['id'])) {
    header('Location: index.php?action=accueil');
}
?>

<div class="layout-grid">

<?php
    include('main-navbar.php');
    include('sidebar.php');

    $posts = getPostsFrom($pdo, $id);
    echo '<div class="main-content-area">';
    include('posts_layout.php');
    echo '</div>';
?>
</div>
