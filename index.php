<?php

include("config/config.php");
include("divers/balises.php");
include("config/actions.php");
include("config/bd.php");
include("functions.php");
include("Modele.php");
session_start();
ob_start(); // Je démarre le buffer de sortie : les données à afficher sont stockées

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySpace</title>

    <link href="./css/styles.css" rel="stylesheet">
</head>

<body>

<?php /* Messages de debug */
if (isset($_SESSION['info'])) {
    echo $_SESSION['info'];
    unset($_SESSION['info']);
}

if(!isset($_GET["id"]) || $_GET["id"]==$_SESSION["id"]) { // Si pas d'id ou id de la personne connectée on affiche le mur
    if(isset($_SESSION['id']))
        $id = $_SESSION["id"];
} else {
    $id = $_GET["id"];
}

if (isset($_GET["action"])) { // Quelle est l'action à faire ?
    $action = $_GET["action"];
} else {
    $action = "feed"; // Action par défaut: Profil
}

if (array_key_exists($action, $listeDesActions) == false) {
    include("vues/404.php");
} else {
    include($listeDesActions[$action]); // Chargement du contenu à afficher
}

ob_end_flush();
?>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
