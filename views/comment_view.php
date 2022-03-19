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
            <div class="card m-2   ">
                <div class="dropdown comment-post p-3 ">
                    <i class="fa fa-ellipsis-h fa-lg" data-bs-toggle="dropdown"></i>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../index.php?pages=edit_comment_view&comment_id=<?= $comment['comment_id']?>">Edit</a></li>
                        <li><a class="dropdown-item" href="../controllers/delete_comment.php?comment_id=<?php echo $comment['comment_id'];?>">Delete</a></li>
                    </ul>
                </div>
                <div class=" p-3">
                    <span ><?php echo $comment['description'] ?></span>

                </div>
            </div>
            <?php endforeach;?>
        </div>
        <form action="../controllers/comment_controller.php" class="form-comment p-3" method="POST">
            <input type="text" class="form-control p-3 comment" name="comment_desc" placeholder="Add comment ...">
            <input type="hidden" value="<?php echo $post['post_id'];?>" name="postId">
            <button type="submit" name="submit-comment" class="btn mt-3">POST COMMENT</button>
        </form>
    </div>
</div>