<div class="container p-3">
<?php
    // TODO: Get all data from database and display it
    require_once('./models/post.php');
    $user = getDataUser();
    $posts = getDataPosts();
    foreach ($posts as $post):
?> 
    <div class="card col-6 mt-2 p-0">
        <div class="card-header profile-post">                
            <img src="../images/<?= $user['image']; ?>" width="10%" alt="" class="image-profile">
            <strong class="p-2 profile_name"><?= $user['username'] ?></strong>
        </div>
        <div class="card-body p-0">
            <div class="caption p-3">
                <?= $post['description'] ?>
            </div>
            <div class="image">
                <img src="../images/<?= $post['image']?>" width="100%" alt="">
            </div>
        </div>
        <div class="card-footer p-3 d-flex justify-content-center">
            <div class="like-group">
                <img src="../images/like.png" alt="" class="like" width="9%"> <label for="like">Like</label>
            </div>
            <div class="comment">   
                <img src="../images/comment.png" class="comment" alt="" width="8%"> <label for="comment">Comment</label>
            </div>
        </div>
    </div>
    <?php 
        endforeach;
    ?>
</div>
