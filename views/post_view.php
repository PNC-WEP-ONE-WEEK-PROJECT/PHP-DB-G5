<div class="container p-3">
<?php
    // TODO: Get all data from database and display it
    require_once('./models/post.php');
    require_once('form_post_view.php');
    
    $user = getDataUser();
    
    $posts = getDataPosts();
    foreach ($posts as $post):
?> 
    <div class="card col-6 mt-2 p-0">
        <div class="card-header profile-post">    
            <div class="profile_user">
                <a href="../index.php?pages=profile_view">
                    <img src="../images/<?= $user['image']; ?>" width="10%" alt="" class="image-profile">
                    <strong class="p-2 profile_name"><?= $user['username'] ?></strong>
                </a>
                
            </div>      
            <div class="dropdown">
                <i class="fa fa-ellipsis-h fa-lg" data-bs-toggle="dropdown"></i>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../index.php?pages=edit_view&post_id=<?= $post['post_id']?>">Edit post</a></li>
                    <li><a class="dropdown-item" href="../controllers/delete_post.php?post_id=<?php echo $post['post_id'];?>">Delete post</a></li>
                </ul>
            </div>


        </div>
        <div class="card-body p-0">
            <div class="caption p-3">
                <?= $post['description'] ?>
            </div>
            <div class="image">
                <img src="../upload_image/<?= $post['image']?>" width="100%" alt="">
            </div>
        </div>
        <?php
            $likes = getLikes();
            $likeIncrement=0;
            foreach ($likes as $like) {
                if ($like['post_id'] == $post['post_id']) {
                    $likeIncrement++;
                }
            }
        ?>
        <div class="card-footer p-3 d-flex">
            <div class="like-group col-5" style="cursor: pointer">
                <a class="text-decoration-none text-black " href="../controllers/like.php?post_id=<?= $post['post_id']?>">
                    <img src="../images/like.png" alt="" class="like mb-2" width="9%"> <label for="like" style="cursor: pointer"> <?php echo $likeIncrement ?> Like</label>
                </a>
            </div>
            <div class="comment-group col-5" style="cursor: pointer;">   
                <a class="text-decoration-none text-black "  href="../index.php?pages=comment_view&post_id=<?= $post['post_id']?>">
                    <img src="../images/comment.png"  class="comment mt-0" alt="" width="8%"> <label for="comment" style="cursor: pointer">Comment</label>
                </a>
            </div>
        </div>
    </div>
    <?php 
        endforeach;
    ?>
</div>