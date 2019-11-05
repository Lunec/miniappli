<?php
if(isset($_GET['id']))
    header('Location: index.php');
?>

<form action='index.php?action=makeNewPost' method='post' class="newpostForm">
    <h1>Publier un post</h1>

    <label for="username">Titre</label>
    <input type="text" name="titre" placeholder="Titre de l'article" required/>

    <label for="body">Contenu</label>
    <textarea name="contenu" placeholder="Contenu" rows=10 required/></textarea>

    <input type="submit" name="submit"/>
</form>
