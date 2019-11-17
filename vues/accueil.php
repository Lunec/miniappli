<?php
    if(!isset($_SESSION['id']))
        header('Location: index.php?action=login');

        $showWall = false;
        if(!isset($_GET["id"]) || $_GET["id"]==$_SESSION["id"]) { // Si pas d'id ou id de la personne connectée, on affiche le mur
            $id = $_SESSION["id"];
            $showWall = true;
        } else {
            $id = $_GET["id"];
            if(areUsersFriends($pdo, $id))
                $showWall = true;
        }

        if($showWall==false) {
            echo '<p class="error-message">Vous n\'êtes pas ami.e avec cette personne. <a href="index.php">Accueil</a></p>';
        } else {
            include('main-navbar.php'); // Navigation and searchbar

            $friends = getFriends($pdo);
            include('sidebar.php');

            // Showing posts
            /*
            $query = getPostsFrom($pdo, $_SESSION['id']);
            while($post = $query->fetch()) {
                $titre = $post['titre'];
                $contenu = $post['contenu'];
                $date = $post['dateEcrit'];

                include('post.php');
            }
            */

        }
?>
