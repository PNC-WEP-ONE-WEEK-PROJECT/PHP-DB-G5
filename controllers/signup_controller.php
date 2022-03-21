<?php
    require_once("../models/post.php");
    
    if( !empty($_POST['username']) && !empty($_POST['email'])&& !empty($_POST['password'])&& !empty($_POST['gender'])){
        
       
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        createUsers($username,  $email, $password,$gender );
        header('location:/index.php');
    

    }else{
       ?>
        <script>alert("please in put all file")</script>;    
     <?php
    header('location:/signup.php');
    }
?>

