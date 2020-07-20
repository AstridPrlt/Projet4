<?php
namespace OCR\P4\model;
require_once 'database.php';
// use \OCR\P4\model\PostSetup;

class AdminManager extends Database {
    
    // connexion
    public function connexion()
    {
        $db = $this->dbConnect();
        $reqDbConnect = $this->bdd->query('SELECT * FROM user WHERE pseudo = "webcreation@astrid-perillat.fr"');
        $this->login = $reqDbConnect->fetch();
        $reqDbConnect->closeCursor();
        return $this->login;
    }
    //liste des posts
    public function getPostsAdmin()
    {
        $db = $this->dbConnect();
        $reqPosts = $this->bdd->query('SELECT * FROM posts');
        $allPostsAdmin = $reqPosts->fetchAll();
        $reqPosts->closeCursor();
        return $allPostsAdmin;
    }
    
    //pour connaître le rang des posts dans la liste
    public function rankPost()
    {
        $db = $this->dbConnect();
        $reqRank = $this->bdd->query('SELECT RANK() OVER (ORDER BY id) AS \'rank\', id, title FROM posts');
        $this->rank = $reqRank->fetchAll();
        $reqRank->closeCursor();
        return $this->rank;
    }
    
    //liste des commentaires pour la partie admin
    public function getCommentsAdmin() 
    {
        $db = $this->dbConnect();
        $reqPostComments = $this->bdd->query('SELECT id, id_post, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y %Hh%imin%ss\') AS date_comment FROM comments ORDER BY date_comment DESC');
        $commentsId = $reqPostComments->fetchAll();
        $reqPostComments->closeCursor();
        return $commentsId;
    }

    //création d'un nouveau post
    public function addPost($title, $content)
    {
        if (!empty($title) && strlen($title) <= 80 && !empty($content)) {
            $db = $this->dbConnect();
            $reqAddPost = $this->bdd->prepare('INSERT INTO posts(title, content, date_post) VALUES(?, ?, NOW())');
            $this->create = $reqAddPost->execute(array($title, $content));
            $reqAddPost->closeCursor();
            }
    }

    //modification d'un post existant
    public function updatePost($title, $content, $postId)
    {
        if (!empty($title) && strlen($title) <= 80 && !empty($content)) {
            $db = $this->dbConnect();
            $reqUpdatePost = $this->bdd->prepare('UPDATE posts SET title = :newTitle, content = :newContent WHERE id = :id');
            $this->update = $reqUpdatePost->execute(array(
                'newTitle' => $title, 
                'newContent' => $content, 
                'id' => $postId
            ));
            $reqUpdatePost->closeCursor();
            return $this->update;
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

    //suppression d'un commentaire
    public function deleteComment($commentToDelete)
    {
        $db = $this->dbConnect();
        $reqDeleteComment = $this->bdd->prepare('DELETE FROM comments WHERE id = ?');
        $reqDeleteComment->execute(array($commentToDelete));
        $reqDeleteComment->closeCursor();
    }
}