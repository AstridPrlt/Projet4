<?php
namespace OCR\P4\model;
require_once 'manager.php';

class PostManager extends Manager {

    //liste des posts
    public function getPosts()
    {
        $db = $this->dbConnect();
        $reqPosts = $this->bdd->query('SELECT * FROM posts');
        return $reqPosts;
    }

    //récupération d'un post précis en fonction de l'id
    public function getPost()
    {
        $db = $this->dbConnect();
        $reqPostId = $this->bdd->prepare('SELECT * FROM posts WHERE id=?');
        $reqPostId->execute(array($_GET['id']));
        return $reqPostId;
    }

    //récupération du dernier post rédigé
    public function getLastPost()
    {
        $db = $this->dbConnect();
        $reqLastPost = $this->bdd->query('SELECT * FROM posts WHERE id=(SELECT max(id) FROM posts)');
        //('SELECT * FROM posts ORDER BY id DESC LIMIT 1')
        return $reqLastPost;
    }

}

?>
