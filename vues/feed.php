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
?>

    <div class="main-content-area">

        <div class="feed">
            <div class="newpost-bar">
                <img src="imgs/avatar1.png" class="avatar-small"/>
                <form method="post" action="index.php?action=publier" class="newpost-form">
                    <input type="text" placeholder="Quoi de neuf ?" class="newpost-input" name="newpost-input"/>
                    <input type="submit" value="Publier" name="newpost" class="newpost-submit"/>
                </form>
            </div>

            <div class="posts">
            <?php
            $posts = getPostsFrom($pdo, $id);
            while($post = $posts->fetch()) {
                $titre = $post['titre'];
                $contenu = $post['contenu'];
                $date = $post['dateEcrit'];
                $idAuteur = $post['idAuteur'];
                $idPost = $post['id'];
                $loginAuteur = getLoginFromID($pdo, $idAuteur);

                include('post.php');
            }
            ?>
            </div>
        </div>
    </div>
</div>
