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

        <div class="post">
            <div class="post-header">
                <div class="post-author">
                    <div class="post-author-avatar">
                        <img src="imgs/avatar1.png" class="avatar-small">
                    </div>
                    <h2 class="post-author-name">gilles</h2>
                </div>

                <div class="post-date">4 DEC 2019 à 00:01</div>
            </div>

            <div class="post-body">
                <p class="post-content">
                    Nickel
                </p>
                <div class="post-img">
                    <img src="../imgs/accueil-bg.png"/>
                </div>
                <p class="post-content">
                    Et encore du texte après.
                </p>
            </div>

            <div class="post-controls">
                <img id="4" class="icon like-control" src="../imgs/icons/like.png" alt="aimer">
                <img id="4" class="icon comment-control" src="../imgs/icons/commentary.png" alt="commenter">
                <a href="index.php?action=delete_post&amp;post_id=4"><img id="4" class="icon delete-control" src="../imgs/icons/delete.png" alt="supprimer"></a>
            </div>

            <div class="post-footer">
                <form action="index.php?action=comment&post_id=<?= $idPost ?>" method="post" class="post-comment-box">
                    <input type="text" name="comment-input" id="comment-input" class="post-comment-input" placeholder="Commentez...">
                </form>
            </div>
        </div>

    <?php
    while($post = $posts->fetch()) {
        $titre = $post['titre'];
        $contenu = $post['contenu'];
        $date = $post['dateEcrit'];
        $idAuteur = $post['idAuteur'];
        $idPost = $post['id'];
        $comments = getCommentsOfPost($pdo, $idPost);
        $loginAuteur = getLoginFromID($pdo, $idAuteur);

        include('post.php');
    }
    ?>
    </div>
</div>
