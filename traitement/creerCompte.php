<?php

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_sec']) && isset($_POST['mail'])) {
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $password_sec = $_POST['password_sec'];
    $mail = $_POST['mail'];

    // Errors handling
}

$sql = "INSERT INTO user(login, mdp, email) VALUES(:login, PASSWORD(:mdp), :email)";
$query = $pdo->prepare($sql);
$query->execute(array(
    'login' => $username,
    'mdp' => $password,
    'email' => $mail
));

?>
