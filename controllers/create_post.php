<?php
    require_once("../models/post.php");
    
    if( !empty($_POST['description']) || !empty($_FILES['file_name']['name'])){
        
        $file_name = $_FILES['file_name']['name'];
        $description = $_POST['description'];

        createPost($description, $file_name);
    

    }else{
       ?>
     
        <script>alert("please in put all file")</script>;
        
     <?php
    }
    header('location:/linkPage.php');
?>

