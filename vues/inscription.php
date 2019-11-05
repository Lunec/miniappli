<?php
if(isset($_GET['id']))
    header('Location: index.php');
?>

<form action='index.php?action=creerCompte' method='post'>
    <h1>Inscription</h1>

    <label for="username">Nom d'utilisateur</label>
    <input type="text" name="username" placeholder="Votre nom d'utilisateur..."  required/>

    <label for="mail">Adresse mail</label>
    <input type="email" name="mail" placeholder="Votre adresse e-mail..." required/>

    <label for="password">Mot de passe</label>
    <input type="password" name="password" placeholder="Votre mot de passe..." required/>

    <label for="password">Confirmez votre mot de passe</label>
    <input type="password" name="password_sec" placeholder="Confirmez votre mot de passe..." required/>

    <input type="submit" name="submitLoginForm"/>
</form>
