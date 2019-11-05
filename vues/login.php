<?php

if(isset($_SESSION['id'])) {
    header('Location: index.php');
}

?>

<form action='index.php?action=connexion' method='post' class="loginForm">
    <h1>Connexion</h1>

    <div class="form-element">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" placeholder="Votre nom d'utilisateur..."  required/>
    </div>
    <div class="form-element">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" placeholder="Votre mot de passe..." required/>
    </div>

    <input type="submit" name="submitLoginForm"/>
</form>
