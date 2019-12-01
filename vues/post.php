<div class="post" id="post_<?= $idPost ?>">
    <div class="post-main">
        <div class="post-author-avatar">
            <img src="imgs/avatar1.png" class="avatar-small"/>
        </div>
        <div class="post-body">
            <h2 class="post-author"><?= $loginAuteur ?></h2>
            <p class="post-content"><?= $contenu ?></p>
        </div>
        <div class="post-date">
            MARDI 11:83
        </div>
    </div>
    <div class="post-footer">
        <form action="index.php?action=comment" method="post" class="post-comment-box">
            <input type="text" class="post-comment-input" placeholder="Commentez...">
        </form>
        <div class="post-controls">
            <a href="index.php?action=delete_post&post_id=<?= $idPost ?>">Supprimer<br/>le post</a>
        </div>
    </div>
</div>
