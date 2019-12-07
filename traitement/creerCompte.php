<?php

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_confirm']) && isset($_POST['email'])) {
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $password_sec = $_POST['password_confirm'];
    $email = $_POST['email'];

    // Query
    $sql = "INSERT INTO user(login, mdp, email) VALUES(:login, PASSWORD(:mdp), :email)";
    $query = $pdo->prepare($sql);
    try {
        $query->execute(array(
            'login' => $username,
            'mdp' => $password,
            'email' => $email
        ));
    } catch (Exception $e) {
        echo '<p class="error-message">L\'inscription a retourné une erreur: '.$e.'. <a href="index.php">ok</a></p>';
    }

    header('Location: index.php');
} else {
    echo '<p class="error-message">Erreur: les champs ne sont pas remplis correctement.<a href="#">ok</a></p>';
}
?>
