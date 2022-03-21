<?php
    session_start();
    require_once("../models/post.php");
    $_SESSION['email'] = $_POST['emailLogin'];
    $_SESSION['password'] = $_POST['passwordLogin'];
    $user=getDataUser($_SESSION['password'],$_SESSION['email']); 
  
    if( !empty($_SESSION['password']) & !empty($_SESSION['email'])){
     
       if($_SESSION['password']==$user['password'] && $_SESSION['email']==$user['email']){



         header('location:/linkPage.php');
       

         }elseif( $_POST['emailLogin']!==$user['email']){
         $emailInvalid="Wrong email";
         header('location:/index.php?emailInvalid=Wrong email');
         
         }elseif( $_POST['passwordLogin']!==$user['password']){
         $passInvalid="Wrong password";
         header('location:/index.php');
         
         }

    }else{
       ?>
     
        <script>alert("please login email and password")</script>;
        
     <?php
      header('location:/index.php');
    }
    
?>

