<?php

include("config/config.php");
include("config/bd.php");
include("divers/balises.php");
include("config/actions.php");
session_start();
ob_start(); // Je démarre le buffer de sortie : les données à afficher sont stockées

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma super application</title>

    <link href="./css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js"></script>
</head>

<body>

<?php /* Messages de debug */
if (isset($_SESSION['info'])) {
    echo "<div>
          <strong>Information : </strong> " . $_SESSION['info'] . "</div>";
    unset($_SESSION['info']);
}
?>

<nav>
    <ul class="navbar" id="main-navbar">
        <div class="navbar-left">
            <li><a href="index.php">Accueil</a></li>
        </div>
        <div class="navbar-right">
            <?php if (isset($_SESSION['id'])) {
                echo "<li><a href='index.php?action=newpost'>Publier</a></li>";
                echo "<li><a href='index.php?action=deconnexion'>Déconnexion</a></li>";
            } else {
                echo "<li><a href='index.php?action=login'>Connexion</a></li>";
                echo "<li><a href='index.php?action=inscription'>Inscription</a></li>";
            } ?>
        </div>

    </ul>
</nav>

<?php
// Quelle est l'action à faire ?
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    } else {
        $action = "accueil";
    }

    // Est ce que cette action existe dans la liste des actions
    if (array_key_exists($action, $listeDesActions) == false) {
        include("vues/404.php"); // NON : page 404
    } else {
        include($listeDesActions[$action]); // Oui, on la charge
    }

    ob_end_flush(); // Je ferme le buffer, je vide la mémoire et affiche tout ce qui doit l'être
?>


<footer>Le pied de page</footer>
</body>
</html>
