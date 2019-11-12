<?php
    if(!isset($_SESSION['id']))
        header('Location: index.php?action=login');

        $showWall = false;
        if(!isset($_GET["id"]) || $_GET["id"]==$_SESSION["id"]) {
            $id = $_SESSION["id"];
            $showWall = true; // On a le droit d afficher notre mur
        } else {
            $id = $_GET["id"];
            // Verifions si on est amis avec cette personne
            $sql = "SELECT * FROM lien WHERE etat='ami'
                    AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))";

            $query = $pdo->prepare($sql);
            $query->execute(array($id, $_GET["id"], $_GET["id"], $id));
            if($line = $query->fetch()) {
                $showWall = true;
            }

            // les deux ids à tester sont : $_GET["id"] et $_SESSION["id"]
            // A completer. Il faut récupérer une ligne, si il y en a pas ca veut dire que lon est pas ami avec cette personne
            // Soit je suis l'initiateur de la demande d'amitié, soit c'est l'autre
        }
        if($showWall==false) {
            echo "Vous n'êtes pas ami.e avec cette personne.";
        } else {
            // Search bar

            ?>
            <form method="post" class="searchbar-wrapper">
                <input type="text" id="searchbar" name="searchbar" placeholder="Rechercher"/>
                <input type="submit" value="rechercher" name="search"/>
            </form>
            <?php

            // Showing posts

            $sql = 'SELECT * FROM ecrit WHERE idAmi=? order by dateEcrit DESC';
            $query = $pdo->prepare($sql);
            $query->execute(array($id));

            while($post = $query->fetch()) {
                $titre = $post['titre'];
                $contenu = $post['contenu'];
                $date = $post['dateEcrit'];

                echo '<div class="post">';
                echo '  <span class="post-date">le ' . $date . '</span>';
                echo '  <h2 class="post-title">' . $titre . '</h2>';
                echo '  <p class="post-content">' . $contenu . '</p>';
                echo '</div>';
            }

            // Showing friends list + pending requests


        }
?>
