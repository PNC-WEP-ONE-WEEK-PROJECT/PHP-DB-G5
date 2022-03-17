<?php
require_once("../models/post.php");
$id = $_GET['post_id'];
$deleteSuccess = deletePost($id);
if ($deleteSuccess) {
    header('location:../index.php');
} else {
    echo "Cannot delete with item id ".$id;
}