<?php
// Voici la liste des actions possibles avec la page à charger associée

$listeDesActions = array(
    "feed"     => "vues/feed.php",
    "profil"      => "vues/profil.php",
    "accueil"     => "vues/accueil.php",

    "comment"     => 'traitement/create_comment.php',
    "accept_friend_request" => "traitement/accept_friend_request.php",
    'delete_friend' => "traitement/delete_friend.php",
    "connexion"   => "traitement/connexion.php",
    "deconnexion" => "traitement/deconnexion.php",
    "inscription" => "traitement/creerCompte.php",
    'publier'     => 'traitement/publier.php',
    'rechercher'  => 'traitement/rechercher.php',
    'rechercher_ami' => 'traitement/rechercher_ami.php',
    'delete_post' => 'traitement/delete_post.php',
    'ajouter'     => 'traitement/ajouter.php'
);
