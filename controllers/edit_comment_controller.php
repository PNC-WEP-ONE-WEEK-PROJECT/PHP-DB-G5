<?php
    require_once('../models/post.php');

    $id = $_POST['commentId'];    
    $comment_desc = $_POST['comment_desc'];

    upDateComment($id, $comment_desc);
    header('location:/index.php');