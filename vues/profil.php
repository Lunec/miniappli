<?php
if(!isset($_SESSION['id'])) {
    header('Location: index.php?action=accueil');
}

include('main-navbar.php');
include('sidebar.php');
?>

<div class="main-content-area">
    <div class="profile">
        <div class="profile-banner"></div>

        <div class="profile-navbar">
            <div class="profile-navbar-group">
                <div class="profile-picture">
                    <img src="../imgs/avatar1.png" alt="profile picture"/>
                </div>

                <span class="profile-name"><?= getLoginFromID($pdo, $id); ?></span>
            </div>
            <?php if(!areUsersFriends($pdo, $id)): ?>
            <form action="index.php?action=ajouter&id=<?= $id ?>" class="profile-controls" method="post">
                <input type="submit" value="Envoyer une invitation"/>
            </form>
            <?php endif; ?>
        </div>

    </div>
    <?php include('wall.php') ?>
</div>
