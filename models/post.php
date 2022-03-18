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
    function createPost($post_desc, $file_name ){
        
            
        $extension = pathinfo($file_name,PATHINFO_EXTENSION);
        $randomno=rand(0,100000);
        $rename='upload'.date('Ymd').$randomno;
        $newname=$rename.'.'.$extension;

        $target = "../upload_image/" .$newname;
        $temporary=$_FILES['file_name']['tmp_name'];
        move_uploaded_file($temporary,$target);

        global $db;
    
        $statement=$db->prepare("INSERT INTO posts(description, image) VALUES (:post_desc,:image)");
        $statement->execute([
            ':post_desc'=>$post_desc,
            ':image'=>$newname

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

    function updatePost($id, $post_desc,  $file_name){
    
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

function getDataComments($post_id) {
    global $db;
    $statement = $db->query("SELECT description FROM comments WHERE post_id = $post_id");
    $comments = $statement->fetchAll();
    return $comments;
}

function createComments($comment_desc,$post_id) {
    global $db;
    $statement = $db->prepare("INSERT INTO comments(description,post_id) VALUES (:comment_desc,:id_post)");
    $statement->execute([
        ':comment_desc'=> $comment_desc,
        ':id_post'=> $post_id
    ]);
    return ($statement -> rowCount()==1);
}