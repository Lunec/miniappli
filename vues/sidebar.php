<?php $friends = getUserList($pdo); ?>

<div class="sidebar">
    <h2>Mes amis</h2>
    <ul class="sidebar-friendslist">
    <?php while($friend = $friends->fetch()) { ?>
        <li class="sidebar-friend">
            <?php if(isLoggedIn()) { ?>
            <span class="sidebar-connected-indicator"></span>
            <?php } ?>
            <a href="index.php?action=profil&id=<?= $friend['id']; ?>"><img class="avatar-small" src="imgs/avatar1.png" alt="avatar de <?= $friend['login']?>"/></a>
            <a href="index.php?action=profil&id=<?= $friend['id']; ?>"><span class="sidebar-friend-name"> <?= $friend['login'] ?></span></a>
        </li>
    <?php } ?>
    </ul>
</div>
