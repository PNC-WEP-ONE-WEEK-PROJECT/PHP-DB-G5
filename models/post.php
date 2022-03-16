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
?>