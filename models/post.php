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
        $statement = $db->query("SELECT description,image,post_id FROM posts");
        $posts = $statement->fetchAll();
        return $posts;
    }
    function createPost($post_desc, $file_name){

        $target = "../upload_image/" .$file_name;
        $temporary=$_FILES['file_name']['tmp_name'];
        move_uploaded_file($temporary,$target);

        global $db;
    
        $statement=$db->prepare("INSERT INTO posts(description, image) VALUES (:post_desc,:image)");
        $statement->execute([
            ':post_desc'=>$post_desc,
            ':image'=>$file_name,

        ]);
        return $statement->rowCount()==1;

    }

    function getPostById($id){
        global $db;
        $statement=$db->prepare("SELECT post_id, description, image FROM posts WHERE post_id=:id_post;");
        $statement->execute([
            ':id_post' => $id
        ]);
        $post = $statement->fetch();
        return $post;
}

    function updatePost($id, $post_desc, $file_name){
        $target = "../upload_image/" .$file_name;
        $temporary=$_FILES['file_name']['tmp_name'];
        move_uploaded_file($temporary,$target);
        global $db;
        $statement=$db->prepare("UPDATE posts SET description=:post_desc, image=:image WHERE post_id=:id_post");
        $statement->execute([
            ':post_desc'=> $post_desc,
            ':image'=> $file_name,
            ':id_post'=> $id
    ]);
    return ($statement->rowCount()==1);
}
  

function deletePost($id)
{
    
    global $db;

    $statament = $db->prepare("DELETE FROM posts where post_id=:id;");
    $statament -> execute([
        ':id' => $id
    ]);
    return ($statament -> rowCount()==1);
}
?>