<?php
require_once("../models/post.php");
$comment_id = $_GET['comment_id'];
$deleteSuccess = deleteComment($comment_id);
if ($deleteSuccess) {
    header('location:../index.php');
} else {
    echo "Cannot delete with item id ".$comment_id;
}
