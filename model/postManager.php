<?php
namespace OCR\P4\model;
require_once '../autoloader.php';
use \OCR\P4\model\Database;

class PostManager extends Database {

    //liste des posts
    public function getPosts()
    {
        $db = $this->dbConnect();
        $reqPosts = $this->bdd->query('SELECT * FROM posts ORDER BY id');
        $allPosts = $reqPosts->fetchAll();
        $reqPosts->closeCursor();
        return $allPosts;
    }

    //récupération d'un post précis en fonction de l'id
    public function getPost()
    {
        $db = $this->dbConnect();
        $reqPostId = $this->bdd->prepare('SELECT * FROM posts WHERE rank_id=?');
        $reqPostId->execute(array($_GET['rank']));
        $dataId = $reqPostId->fetch();
        $reqPostId->closeCursor();
        return $dataId;
        
    }

    //récupération du dernier post rédigé
    public function getLast()
    {
        $db = $this->dbConnect();
        $reqLastPost = $this->bdd->query('SELECT * FROM posts WHERE id=(SELECT max(id) FROM posts)');
        //('SELECT * FROM posts ORDER BY id DESC LIMIT 1')
        $dataLast = $reqLastPost->fetch();
        $reqLastPost->closeCursor();
        return $dataLast;
    }


}

?>
