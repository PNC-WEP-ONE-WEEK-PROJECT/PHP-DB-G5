<?php
require_once("../models/post.php");
$post_id = $_GET['post_id'];
AddLike(1,$post_id);
header('location: /linkPage.php');
?>