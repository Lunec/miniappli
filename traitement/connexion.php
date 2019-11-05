<?php

$username = "";
$password = "";

$sql = "SELECT * FROM user WHERE login=? AND mdp=PASSWORD(?)";
$query = $pdo->prepare($sql);

if(isset($_POST['username']) && isset($_POST['password'])) {
    // Getting values
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Exceptions
}

$query->execute(array($username, $password));

$line = $query->fetch(); // ici le login est unique, donc on sait que l'on peut avoir zero ou une seule ligne.
if(!$line) {
    header('Location: index.php?action=login');
} else {
    $_SESSION['id'] = $line['id'];
    $_SESSION['login'] = $line['login'];
    header('Location: index.php');
}

// Si $line est faux le couple login mdp est mauvais, on retourne au formulaire

// sinon on crée les variables de session $_SESSION['id'] et $_SESSION['login'] et on va à la page d'accueil

?>
