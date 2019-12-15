<?php if(isset($_POST['searchbar'])):
    $users = searchInUsers($pdo, $_POST['searchbar']);

    if($_POST['searchbar'] == '*') {
        $users = getUserList($pdo);
    }

    if($users->rowCount() == 1) {
        $user = $users->fetch();
        header('Location:index.php?action=profil&id='.$user['id']);
    }

    include('vues/main-navbar.php');
    include('vues/sidebar.php');
    ?>
    <div class="main-content-area">
        <ul class="search-response">
            <?php while($user = $users->fetch()): ?>
                <li><a href="index.php?action=profil&id=<?= $user['id'] ?>"><img src="<?= $user[''] ?>" alt="avatar"/><?= $user['login'] ?></a></li>
            <?php endwhile; ?>
        </ul>
    </div>
<?php endif; ?>
