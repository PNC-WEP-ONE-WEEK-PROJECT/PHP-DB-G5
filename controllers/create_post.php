<?php
    require_once("../models/post.php");
        
    $file_name = $_FILES['file_name']['name'];
    $description = $_POST['description'];

    createPost($description, $file_name);

    header('location:/index.php');
?>