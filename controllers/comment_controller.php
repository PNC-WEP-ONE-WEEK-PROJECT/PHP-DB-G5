<?php
    require_once("../models/post.php");

    $comment_desc = $_POST['comment_desc'];
    $post_id = $_POST['postId'];
    createComments($comment_desc,$post_id);

    header('location:/index.php');
?>

