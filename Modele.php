<?php

function isLoggedIn() {
    $loggedIn = isset($_SESSION['id']) ? true : false;
    return $loggedIn;
}

function getUserList($pdo) {
    $query = $pdo->prepare('SELECT * FROM user');
    $query->execute();
    return $query;
}

function getPostsFrom($pdo, $id) {
    if(!is_numeric($id)) // If ID is not a number, return an error feedback
        return "Impossible d'obtenir la liste des billets: l'id entrée est invalide.";

    $query = $pdo->prepare('SELECT * FROM ecrit WHERE idAmi=? order by dateEcrit DESC');
    $query->execute([$id]);
    return $query;
}

function getPendingFriendRequests($pdo) {
    if(!isLoggedIn())
        return "Impossible d'obtenir la liste des invitations en attente: vous n'êtes pas connecté.";
    $query = $pdo->prepare("SELECT utilisateur.* FROM utilisateur WHERE id IN(SELECT idUtilisateur1 FROM lien WHERE idUtilisateur2=? AND etat='attente'))");
    $query->execute([$_SESSION['id']]);
    return $query;
}

function getUnansweredFriendRequests($pdo) {
    if(!isLoggedIn())
        return "Impossible d'obtenir la liste des personne n'ayant pas répondu à votre invitation: vous n'êtes pas connecté.";
    $query = $pdo->prepare("SELECT utilisateur.* FROM utilisateur INNER JOIN lien ON utilisateur.id=idUtilisateur2 AND etat='attente' AND idUtilisateur1=?");
    $query->execute([$_SESSION['id']]);
    return $query;
}

function getFriends($pdo) {
    if(!isLoggedIn())
        return "Impossible d'obtenir la liste d'amis: vous n'êtes pas connecté.";
    $query = $pdo->prepare("SELECT * FROM user WHERE id IN ( SELECT user.id FROM user INNER JOIN lien ON idUtilisateur1=user.id AND etat='ami' AND idUTilisateur2=? UNION SELECT user.id FROM user INNER JOIN lien ON idUtilisateur2=user.id AND etat='ami' AND idUTilisateur1=?)");
    $query->execute([$_SESSION['id'], $_SESSION['id']]);
    return $query;
}

function areUsersFriends($pdo, $id) {
    if(!isLoggedIn())
        return "Impossible d'accomplir cette action: vous n'êtes pas connecté.";

    $query = $pdo->prepare("SELECT * FROM lien WHERE etat='ami' AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))");
    $query->execute(array($_SESSION['id'], $id, $id, $_SESSION['id']));
    $areUsersFriends = $query->fetch() ? true : false;
    return $areUsersFriends;
}

function searchInUsers($pdo, $login) {
    $login = htmlspecialchars($login);

    $query = $pdo->prepare('SELECT * FROM user WHERE user.login LIKE ?');
    $query->execute(['%' . $login . '%']);
    return $query;
}
