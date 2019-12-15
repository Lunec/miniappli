<?php

function isLoggedIn() {
    $loggedIn = isset($_SESSION['id']) ? true : false;
    return $loggedIn;
}

function getLoginFromID($pdo, $id) {
    $query = $pdo->prepare("SELECT login FROM user WHERE user.id=?");
    $query->execute([$id]);
    $line = $query->fetch();
    if(!$line)
        return 'Erreur: impossible de récupérer le login correspondant à cette id.';
    return $line['login'];
}

function createPost($args) {
    $pdo = $args['pdo'];
    $query = $pdo->prepare("INSERT INTO ecrit(contenu, dateEcrit, idAuteur, idAmi, image) VALUES(:body, NOW(), :idAuteur, :idAmi, :image)");
    $query->execute(array(
        'body' => $args['text'],
        'idAuteur' => $_SESSION['id'],
        'idAmi' => $args['idAmi'],
        'image' => $args['image']
    ));
    return $query;
}

function comment($pdo, $comment, $postID) {
    $query = $pdo->prepare("INSERT INTO commentaire(contenu, date, idAuteur, idPost) VALUES(:contenu, NOW(), :idAuteur, :idPost)");
    $query->execute(array(
        'contenu' => $comment,
        'idAuteur' => $_SESSION['id'],
        'idPost' => $postID
    ));
    return $query;
}

function deletePost($pdo, $id) {
    $query = $pdo->prepare('DELETE FROM commentaire WHERE idPost=?');
    $query->execute([$id]);

    if(!$query)
        triggerDebugMessage('Impossible de supprimer les commentaires associés à ce post.');

    $query = $pdo->prepare('DELETE FROM ecrit WHERE id=?');
    $query->execute([$id]);

    if(!$query)
        triggerDebugMessage('Impossible de supprimer le post.');

    header('Location:index.php');
}

function getCommentsOfPost($pdo, $postID) {
    $query = $pdo->prepare('SELECT * FROM commentaire WHERE idPost=?');
    $query->execute([$postID]);
    return $query;
}

function getUserList($pdo) {
    $query = $pdo->prepare('SELECT * FROM user');
    $query->execute();
    return $query;
}

function getFeed($pdo) {
    // 1. Récupérer les amis
    // 2. Récupérer les posts de ces amis

    $query = "SELECT * FROM ecrit JOIN user ON idAuteur=user.id WHERE idAmi=:id OR idAuteur=:id OR idAuteur IN
    (SELECT idUtilisateur1 FROM lien WHERE etat='ami' AND idUtilisateur2=:id)
    OR  idAuteur IN ( SELECT idUtilisateur2 FROM lien WHERE etat='ami' AND idUtilisateur1=:id)
    ORDER BY dateEcrit DESC";
    $query = $pdo->prepare($query);
    $query->execute(array(
        'id' => $_SESSION['id']
    ));
    return $query;
}

function getPostsFrom($pdo, $id) {
    if(!is_numeric($id)) // If ID is not a number, return an error feedback
        return "Impossible d'obtenir la liste des billets: l'id entrée est invalide.";

    $query = $pdo->prepare('SELECT * FROM ecrit WHERE idAuteur=? order by dateEcrit DESC');
    $query->execute([$id]);
    return $query;
}

function getPostsFor($pdo, $id) {
    if(!is_numeric($id))
        return "Impossible d'obtenir la liste des billets: l'id entrée est invalide.";

    $query = $pdo->prepare('SELECT * FROM ecrit WHERE idAmi=? order by dateEcrit DESC');
    $query->execute([$id]);
    return $query;
}

function sendFriendRequest($pdo, $id) {
    if(!isLoggedIn())
        return "Impossible d'envoyer l'invitation: vous n'êtes pas connecté.";

    $query = $pdo->prepare('INSERT INTO lien VALUES(NULL,?,?,"attente")');
    $query->execute([$_SESSION['id'], $id]);
    return $query;
}

function getPendingFriendRequests($pdo) {
    if(!isLoggedIn())
        return false;
    $query = $pdo->prepare("SELECT user.* FROM user WHERE id IN(SELECT idUtilisateur1 FROM lien WHERE idUtilisateur2=? AND etat='attente')");
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
        return "Vous n'êtes pas connecté.";

    if($id == $_SESSION['id'])
        return "Impossible d'effectuer cette action: un utilisateur ne peut être ami avec lui-même.";

    $query = $pdo->prepare("SELECT * FROM lien WHERE etat='ami' AND ((idUtilisateur1=? AND idUtilisateur2=?) OR (idUtilisateur1=? AND idUtilisateur2=?))");
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

function searchInFriends($pdo, $login) {
    $query = $pdo->prepare("SELECT * FROM user,lien WHERE user.login LIKE ? AND lien.etat='ami' AND (idUtilisateur1=? AND idUtilisateur2=?)  OR ((idUtilisateur1=? AND idUtilisateur2=?)))");
    $query->execute(['%' . $login . '%', $_SESSION['id'], $id, $id, $_SESSION['id']]);
    return $query;
}

function login($pdo, $login, $password) {
    $sql = "SELECT * FROM user WHERE login=? AND mdp=PASSWORD(?)";
    $query = $pdo->prepare($sql);
    $query->execute(array($login, $password));

    return $query->fetch(); // ici le login est unique, donc on sait que l'on peut avoir zero ou une seule ligne.
}

function acceptFriendRequest($pdo, $id) {
    $sql = "UPDATE lien SET etat='ami' WHERE idUtilisateur1=? AND idUtilisateur2=?";
    $query = $pdo->prepare($sql);
    if($query->execute([$id, $_SESSION['id']]))
        return true;
    return false;
}

function deleteFriend($pdo, $id) {
    $sql = "DELETE FROM lien WHERE etat='ami' AND ((idUtilisateur1=? AND idUtilisateur2=?) OR (idUtilisateur2=? AND idUtilisateur1=?))";
    $query = $pdo->prepare($sql);
    if($query->execute([$id, $_SESSION['id'], $id, $_SESSION['id']])) {
        return true;
    }

    return false;
}

function friendRequestSentAlready($pdo, $id) {
    if($id == $_SESSION['id'])
        return false;

    $query = $pdo->prepare("SELECT * FROM lien WHERE etat='attente' AND ((idUtilisateur1=? AND idUtilisateur2=?) OR (idUtilisateur1=? AND idUtilisateur2=?))");
    $query->execute([$id, $_SESSION['id'], $_SESSION['id'], $id]);

    if($query->fetch()) // if fetch() found something, friend request was already sentImpossible d'obtenir la liste des billets: l'id entrée est invalide.
        return true;

    return false;
}
