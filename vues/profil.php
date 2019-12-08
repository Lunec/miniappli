<?php
if(!isset($_SESSION['id'])) {
    header('Location: index.php?action=accueil');
}

include('main-navbar.php');
include('sidebar.php');
if(isset($_GET['id'])) {
    $posts = getPostsFrom($pdo, $_GET['id']);
} else {
    $posts = getPostsFrom($pdo, $_SESSION['id']);
}

?>

<div class="main-content-area profile-main">
    <div class="profile">
        <div class="profile-banner"></div>

        <div class="profile-navbar">
            <div class="profile-navbar-group">
                <div class="profile-picture">
                    <img src="../imgs/avatar1.png" alt="profile picture"/>
                </div>

                <span class="profile-name"><?= getLoginFromID($pdo, $id); ?></span>
            </div>
            <?php if(areUsersFriends($pdo, $id) && $id != $_SESSION['id']): ?>

            <form action="index.php?action=delete_friend&id=<?= $id ?>" class="profile-controls" method="post">
                <input type="submit" value="Retirer de la liste d'amis"/>
            </form>

        <?php elseif((!areUsersFriends($pdo, $id) && !friendRequestSentAlready($pdo, $id)) && $id != $_SESSION['id']): ?>

            <form action="index.php?action=ajouter&id=<?= $id ?>" class="profile-controls" method="post">
                <input type="submit" value="Envoyer une invitation"/>
            </form>
            <?php endif; ?>
        </div>

    </div>
    <?php if(areUsersFriends($pdo, $id) || $_SESSION['id'] == $id):
        include('posts_layout.php');
    else: ?>

    <?php endif; ?>
</div>
