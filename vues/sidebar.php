<div class="sidebar">
    <h2>Mes amis</h2>
    <ul class="sidebar-friendslist">
    <?php while($friend = $friends->fetch()) { ?>
        <li class="sidebar-friend">
            <?php if(isLoggedIn()) { ?>
                <span class="connected-indicator"></span>
            <?php } ?>
            <img src="imgs/avatar1.png" alt="avatar de <?= $friend['login']?>"/>
            <?= $friends['login'] ?>
        </li>
    <?php } ?>
    </ul>
</div>
