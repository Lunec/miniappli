<?php
/*
    Accueil: Page d'inscription et connexion.
*/

if(isset($_COOKIE['remember_me'])) {
    
}

?>

<div class="accueil-container">
    <div class="accueil-content">
        <form action="index.php?action=connexion" class="login-form" method="post">
            <input type="text" name="login" placeholder="Identifiant"/>
            <input type="password" name="password" placeholder="Mot de passe"/>
            <input type="submit" value="Connexion"/>
        </form>

        <div class="accueil-header">
            <img src="imgs/logo.png" alt="MySpace Logo"/>
            <h1>MySpace</h1>
        </div>

        <form action="index.php?action=inscription" class="register-form" method="post">
            <h2>Inscription</h2>

            <div class="form-control">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" placeholder="Audemard"/>
            </div>

            <div class="form-control">
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="email@mail.com"/>
            </div>

            <div class="form-control">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" placeholder="Entrez un mot de passe sûr"/>
            </div>

            <div class="form-control">
                <label for="password_confirm">Confirmez le mot de passe</label>
                <input type="password" name="password_confirm" placeholder="Confirmez le mot de passe"/>
            </div>

            <input type="submit" value="Inscription"/>
        </form>
    </div>
</div>
