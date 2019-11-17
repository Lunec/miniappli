<?php if(isset($_POST['search']) && isset($_POST['searchbar'])) {
    $users = searchInUsers($pdo, $_POST['searchbar']);
    echo '<ul>Résultat de la recherche:';

    while($user = $users->fetch()) {
        echo '<li><a href="index.php?id=' . $user['id'] . '">' . $user['login'] . '</a></li>';
    }
    echo '</ul>';
}
