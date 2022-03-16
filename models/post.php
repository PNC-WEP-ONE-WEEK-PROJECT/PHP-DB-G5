<?php
require_once('database.php');
?>
<?php
    function getDataUser() {
        global $db;
        $statement = $db->query("SELECT username,image FROM users;");
        $users = $statement->fetch();
        return $users;
    }
    function getDataPosts() {
        global $db;
        $statement = $db->query("SELECT description,image FROM posts");
        $posts = $statement->fetchAll();
        return $posts;
    }
    function createPost($post_desc, $file_name){

        $target = "../images/" .$_FILES['file_name']['name'];
        move_uploaded_file($_FILES['file_name']['tmp_name'],$target);

        global $db;
    
        $statement=$db->prepare("INSERT INTO posts(description, image) VALUES (:post_desc,:image)");
        $statement->execute([
            ':post_desc'=>$post_desc,
            ':image'=>$file_name
        ]);
       


        return $statement->rowCount()==1;




    }
  
   
?>