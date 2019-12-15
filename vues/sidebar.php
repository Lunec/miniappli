<?php

$friends = getFriends($pdo);
$pendingFriendRequests = getPendingFriendRequests($pdo);
?>

<div class="sidebar">
    <h2>Astronautes connectés</h2>
    <form class="sidebar-search" method="post" action="index.php?action=rechercher_ami"/>
        <input name="friend-search" type="text" placeholder="Rechercher"/>
    </form>
    <ul class="sidebar-friendslist">
    <?php

    while($user = $pendingFriendRequests->fetch()){?>

        <li class="sidebar-friend">
            <a href="index.php?action=profil&id=<?= $user['id']; ?>"><img class="avatar-small" src="imgs/avatar1.png" alt="avatar de <?= $user['login']?>"/></a>
            <a href="index.php?action=profil&id=<?= $user['id']; ?>"><span class="sidebar-friend-name"> <?= $user['login'] ?></span></a>
            <form method="post" action="index.php?action=accept_friend_request&id=<?= $user['id'] ?>">
                <input class="sidebar-btn" type="submit" value="Accepter" name="accept_friend_request"/>
            </form>
            <form method="post" action="index.php?action=reject_friend_request&id=<?= $user['id'] ?>">
                <input class="sidebar-btn" type="submit" value="Refuser" name="reject_friend_request"/>
            </form>
        </li>
    <?php } ?>
    <?php while($friend = $friends->fetch()) { ?>
        <li class="sidebar-friend">
            <a href="index.php?action=profil&id=<?= $friend['id']; ?>"><img class="avatar-small" src="imgs/avatar1.png" alt="avatar de <?= $friend['login']?>"/></a>
            <a href="index.php?action=profil&id=<?= $friend['id']; ?>"><span class="sidebar-friend-name"> <?= $friend['login'] ?></span></a>
        </li>
    <?php } ?>
    </ul>
</div>
