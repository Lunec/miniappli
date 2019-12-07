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
        <img class="icon" src="../imgs/icons/like.png" alt="aimer"/>
        <img class="icon" src="../imgs/icons/commentary.png" alt="commenter"/>
        <img class="icon" src="../imgs/icons/delete.png" alt="supprimer"/>
    </div>

    <div class="post-footer">
        <form action="index.php?action=comment" method="post" class="post-comment-box">
            <input type="text" class="post-comment-input" placeholder="Commentez...">
        </form>
    </div>
</div>
