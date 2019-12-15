<?php
if(!isset($_SESSION['id'])) {
    header('Location: index.php?action=accueil');
}

?>

<div class="page-not-found">
    <div class="page-not-found-content">
        <h1>Désolé, cette page est introuvable.</h1>
        <a href="index.php?action=feed">Retourner à l'accueil</a>
        <img src="../imgs/astronaute.png"/>
    </div>
</div>
