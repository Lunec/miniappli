<div class="feed">
    <div class="newpost-bar">
        <img src="imgs/avatar1.png" class="avatar-small"/>
        <form method="post" action="index.php?action=publier&id=<?= $id ?>" class="newpost-form">
            <textarea id="newpost-text" type="text" placeholder="Quoi de neuf ?" name="newpost-text"></textarea>

            <div class="newpost-controls">
                <input id="newpost-media" type="submit" value="+ Photos" name="newpost-media"/>
                <input id="newpost-submit" type="submit" value="Publier" name="newpost"/>
            </div>

        </form>
    </div>

    <div class="posts">
    <?php
    while($post = $posts->fetch()) {
        $titre = $post['titre'];
        $contenu = $post['contenu'];
        $date = $post['dateEcrit'];
        $idAuteur = $post['idAuteur'];
        $idPost = $post['id'];
        $loginAuteur = getLoginFromID($pdo, $idAuteur);

        include('post.php');
    }
    ?>
    </div>
</div>
