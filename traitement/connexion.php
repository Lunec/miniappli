<?php

$username = "";
$password = "";

if(isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $loginFeedback = login($pdo, $login, $password);

    if($loginFeedback) { // If login was successfull
        $_SESSION['id'] = $loginFeedback['id'];
        $_SESSION['login'] = $loginFeedback['login'];
        header('Location: index.php');
    } else {
        $_SESSION['info'] = "Couldn't log in.";
        header('Location: index.php?action=accueil');
    }
} else {
    header('Location: index.php?action=accueil');
}

?>
