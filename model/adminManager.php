<?php
namespace OCR\P4\model;
require_once 'database.php';
use \OCR\P4\model\PostSetup;

class AdminManager extends Database {
    
    //liste des posts
    public function getPostsAdmin()
    {
        $db = $this->dbConnect();
        $reqPosts = $this->bdd->query('SELECT * FROM posts');
        $allPostsAdmin = $reqPosts->fetchAll();
        $reqPosts->closeCursor();
        return $allPostsAdmin;
    }
    
    //liste des commentaires pour la partie admin
    public function getCommentsAdmin() 
    {
        $db = $this->dbConnect();
        $reqPostComments = $this->bdd->query('SELECT * FROM comments ORDER BY date_comment DESC');
        $commentsId = $reqPostComments->fetchAll();
        $reqPostComments->closeCursor();
        return $commentsId;
    }

    //création d'un nouveau post
    public function addPost()
    {
        if (!empty(($_POST['title'])) && strlen(($_POST['title'])) <= 80 && !empty($_POST['content'])) {
            $db = $this->dbConnect();
            $reqAddPost = $this->bdd->prepare('INSERT INTO posts(title, content, date_post) VALUES(?, ?, NOW())');
            $reqAddPost->execute(array($_POST['title'], $_POST['content']));
            $reqAddPost->closeCursor();
            }
    }

    //modification d'un post existant
    public function updatePost($title, $content, $postid)
    {
        if (!empty($title) && strlen($title) <= 80 && !empty($content)) {
            $db = $this->dbConnect();
            $reqUpdatePost = $this->bdd->prepare('UPDATE posts SET title = :newTitle, content = :newContent WHERE id = :id');
            $reqUpdatePost->execute(array(
                'newTitle' => $title, 
                'newContent' => $content, 
                'id' => $postId
            ));
            $reqUpdatePost->closeCursor();
            }
    }

    //suppression d'un post
    public function deletePost($dataPostId)
    {
        $db = $this->dbConnect();
        $reqDeletePost = $this->bdd->prepare('DELETE FROM posts WHERE id = ?');
        $reqDeletePost->execute(array($dataPostId));
        $reqDeletePost->closeCursor();
    }
}