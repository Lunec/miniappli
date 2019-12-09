<div class="post" id="post_<?= $idPost ?>">
    <div class="post-header">
        <div class="post-author">
            <div class="post-author-avatar">
                <img src="imgs/avatar1.png" class="avatar-small"/>
            </div>
            <h2 class="post-author-name"><?= $loginAuteur ?></h2>
        </div>

        <div class="post-date">4 DEC 2019 à 00:01</div>
    </div>

    <div class="post-body">
        <p class="post-content"><?= $contenu ?></p>
    </div>

    <div class="post-controls">
        <img id="<?= $idPost ?>" class="icon like-control" src="../imgs/icons/like.png" alt="aimer"/>
        <img id="<?= $idPost ?>" class="icon comment-control" src="../imgs/icons/commentary.png" alt="commenter"/>
        <a href="index.php?action=delete_post&post_id=<?= $idPost ?>"><img id="<?= $idPost ?>" class="icon delete-control" src="../imgs/icons/delete.png" alt="supprimer"/></a>
    </div>

    <div class="post-footer">
        <form action="index.php?action=comment&post_id=<?= $idPost ?>" method="post" class="post-comment-box">
            <input type="text" name="comment-input" class="post-comment-input" placeholder="Commentez...">
        </form>
    </div>
</div>

<?php if($comments): ?>
<div class="comments">
    <?php while($comment = $comments->fetch()) { ?>
    <div class="comment">
        <a class="comment-author" href="index.php?action=profile&id=<?= $comment['idAuteur']; ?>"><?= getLoginFromID($pdo, $comment['idAuteur']); ?></a>
        <div class="comment-body"><?= $comment['contenu']; ?></div>
    </div>
    <?php } ?>
</div>
<?php endif; ?>
