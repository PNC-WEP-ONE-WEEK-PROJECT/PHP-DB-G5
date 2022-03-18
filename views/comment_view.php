<?php
require_once('./models/post.php');
   $id = $_GET['post_id'];
   $post = getPostById($id);
?>
<div class="container p-3 container-comment">
    <div class="card col-6 p-2">
        <div class="commenter p-3">
            <div class="profile p-2">
                <img src="../images/rady.jpg" alt="profile" class="image-profile" width="6%">
                <strong class="p-2 profile-name">Rady Y</strong>
            </div>
            <?php
                require_once('./models/post.php');
                $comments = getDataComments($id);
                foreach ($comments as $comment):
            ?>
            <div class="card m-2 d-flex justify-content-between">
                <span class="comment-content p-3"><?php echo $comment['description'] ?></span>
            </div>
            <?php endforeach;?>
        </div>
        <form action="../controllers/comment_controller.php" class="form-comment p-3" method="POST">
            <input type="text" class="form-control p-3 comment" name="comment_desc" placeholder="Add comment ...">
            <input type="hidden" value="<?php echo $post['post_id'];?>" name="postId">
            <button type="submit" name="submit-comment" class="btn mt-3">POST</button>
        </form>
    </div>
</div>