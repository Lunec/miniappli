<?php

$friends = getFriends($pdo);
$pendingFriendRequests = getPendingFriendRequests($pdo);
?>

<div class="sidebar">
    <form class="sidebar-search sidebar-block" method="post" action="index.php?action=rechercher_ami"/>
        <label for="friend-search">Rechercher un astronaute</label>
        <input id="friend-search" type="search" class="searchbar" name="searchbar" placeholder="Rechercher"/>
    </form>
    <div class="sidebar-block">
        <h2>Demandes d'amitié</h2>
        <ul class="sidebar-friendslist">
        <?php if(!$pendingFriendRequests): ?>
            <?php while($user = $pendingFriendRequests->fetch()): // Displaying pending friend requests ?>
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
            <?php endwhile; ?>
        <?php else: ?>
            <p class="sidebar-content-not-found">
                Aucune demande d'amitié pour le moment.
            </p>
        <?php endif; ?>
    </div>
    <ul class="sidebar-block">
        <h2>Astronautes connectés</h2>
        <?php if(!$friends): ?>
            <?php while($friend = $friends->fetch()): // Displaying online friends ?>
                <li class="sidebar-friend">
                    <a href="index.php?action=profil&id=<?= $friend['id']; ?>"><img class="avatar-small" src="imgs/avatar1.png" alt="avatar de <?= $friend['login']?>"/></a>
                    <a href="index.php?action=profil&id=<?= $friend['id']; ?>"><span class="sidebar-friend-name"> <?= $friend['login'] ?></span></a>
                </li>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="sidebar-content-not-found">
                Aucune ami n'est connecté pour le moment.
            </p>
        <?php endif; ?>
        </ul>
    </div>
</div>
