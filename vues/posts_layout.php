<div class="feed">
    <div class="newpost-bar">
        <img src="imgs/avatar1.png" class="avatar-small"/>
        <form method="post" action="index.php?action=publier&id=<?= $id ?>" class="newpost-form" enctype="multipart/form-data">
            <textarea id="newpost-text" type="text" placeholder="Quoi de neuf ?" name="newpost-text"></textarea>

            <div class="newpost-controls">
                <label for="newpost-media" class="newpost-media-label">+ Image</label>
                <input id="newpost-media" type="file" name="newpost-media" accept="image/png, image/jpeg, image/jpg, images/gif"/>
                <input id="newpost-submit" type="submit" value="Publier" name="newpost"/>
            </div>

        </form>
    </div>

    <div class="posts">

    <?php
    while($post = $posts->fetch()) {
        $contenu = $post['contenu'];
        $dateEcrit = $post['dateEcrit'];
        $idAuteur = $post['idAuteur'];
        $idPost = $post['id'];
        $postImage = $post['image'];
        $comments = getCommentsOfPost($pdo, $idPost);
        $loginAuteur = getLoginFromID($pdo, $idAuteur);

        include('post.php');
    }
    ?>
    </div>
</div>
