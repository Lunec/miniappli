<?php

if(isset($_POST['search']) && isset($_POST['searchbar'])) {
    $search = htmlspecialchars($_POST['searchbar']);

    $sql = 'SELECT * FROM user WHERE login LIKE ?%';
    $query = $pdo->prepare($sql);
    $query->execute($search);
}


?>
