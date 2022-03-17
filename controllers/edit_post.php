<?php
        require_once('../models/post.php');

        $id = $_POST['postId'];
        $post_desc = $_POST['description'];
        $file_name = $_FILES['file_name']['name'];

        updatePost($id, $post_desc,  $file_name);
        
        header('location: /index.php');


    ?>
