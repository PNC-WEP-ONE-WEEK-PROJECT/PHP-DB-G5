<?php
    require_once('./models/post.php');

   $id = $_GET['comment_id'];

   $comment = getCommentById($id);

?>

<form action="../controllers/edit_comment_controller.php" class="form-comment p-3" method="POST">
    <input type="text" class="form-control p-3 comment" value="<?php echo $comment['description'];?>" name="comment_desc" placeholder="Add comment ...">
    <input type="hidden" value="<?php echo $comment['comment_id'];?>" name="commentId">
    <button type="submit" name="submit-comment" class="btn mt-3">POST</button>
</form>