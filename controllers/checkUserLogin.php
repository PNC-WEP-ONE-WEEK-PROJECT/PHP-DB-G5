<?php
    require_once("../models/post.php");
    $user=getDataUser();
    $emailInvalid="";
    $passInvalid="";
    if( !empty($_POST['passwordLogin']) & !empty($_POST['emailLogin'])){
     
       if($_POST['passwordLogin']==$user['password'] && $_POST['emailLogin']==$user['email']){

        header('location:/linkPage.php');
       

         }elseif( $_POST['emailLogin']!==$user['email']){
         $emailInvalid="Wrong email";
         header('location:/index.php');
         
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

