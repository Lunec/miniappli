<?php

if(isset($_POST['submit']) && isset($_POST['titre']) && isset($_POST['contenu'])) {
    $titre = htmlspecialchars($_POST['titre']);
    $contenu = htmlspecialchars($_POST['contenu']);

    // Errors handling
} else {
    header('Location:index.php');
}

$sql = "INSERT INTO ecrit(titre, contenu, dateEcrit, idAuteur, idAmi) VALUES(:title, :body, CURDATE(), :idAuteur, :idAmi)";
$query = $pdo->prepare($sql);
$query->execute(array(
    'title' => $titre,
    'body' => $contenu,
    'idAuteur' => $_SESSION['id'],
    'idAmi' => $_SESSION['id']
));

echo "ok";

?>
