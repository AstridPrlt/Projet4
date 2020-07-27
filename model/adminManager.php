<?php
namespace OCR\P4\model;
require_once 'database.php';

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
    //liste des épisodes
    public function getPostsAdmin()
    {
        $db = $this->dbConnect();
        $reqPosts = $this->bdd->query('SELECT * FROM posts ORDER BY id');
        $allPostsAdmin = $reqPosts->fetchAll();
        $reqPosts->closeCursor();
        return $allPostsAdmin;
    }
    
    // //pour connaître le numéro de l'épisode (=son rang du post dans la liste)
    // public function rankPost($idToRank)
    // {
    //     $db = $this->dbConnect();
    //     $reqRank = $this->bdd->prepare('SELECT COUNT(*) FROM posts WHERE id <= ?');
    //     $reqRank->execute(array($idToRank));
    //     $rank = $reqRank->fetch();
    //     $reqRank->closeCursor();
    //     return $rank;
    // }
    
    //liste des commentaires pour la partie admin
    public function getCommentsAdmin() 
    {
        $db = $this->dbConnect();
        $reqPostComments = $this->bdd->query('SELECT id, id_post, author, comment, DATE_FORMAT(date_comment, \'Le %d/%m/%Y à %H h %i\') AS date_comment FROM comments ORDER BY date_comment DESC');
        $commentsId = $reqPostComments->fetchAll();
        $reqPostComments->closeCursor();
        return $commentsId;
    }

    //création d'un nouvel épisode
    public function addPost($title, $content)
    {
        if (!empty($title) && strlen($title) <= 80 && !empty($content)) {
            $db = $this->dbConnect();
            $reqAddPost = $this->bdd->prepare('INSERT INTO posts(title, content, date_post, rank_id) VALUES(?, ?, NOW(), (SELECT COUNT(id) + 1 FROM(SELECT * FROM posts) AS getRank))');
            $this->create = $reqAddPost->execute(array($title, $content));
            $reqAddPost->closeCursor();
            }
    }

    //modification d'un épisode existant
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

    //suppression d'un épisode
    public function deletePost($dataPostId)
    {
        $db = $this->dbConnect();
        $reqDeletePost = $this->bdd->prepare('DELETE FROM posts WHERE id = ?');
        $reqDeletePost->execute(array($dataPostId));
        $reqDeletePost->closeCursor();

        $updateRanks = $this->bdd->prepare('UPDATE posts SET rank_id = rank_id - 1 WHERE id > :id');
        $updateRanks->execute(array('id' => $dataPostId));
        $updateRanks->closeCursor();

        $updateRanksComments = $this->bdd->prepare('UPDATE comments SET rank_post = rank_post - 1 WHERE id_post > :id');
        $updateRanksComments->execute(array('id' => $dataPostId));
        $updateRanksComments->closeCursor();
    }

    //suppression d'un commentaire
    public function deleteComment($commentToDelete)
    {
        $db = $this->dbConnect();
        $reqDeleteComment = $this->bdd->prepare('DELETE FROM comments WHERE id = ?');
        $reqDeleteComment->execute(array($commentToDelete));
        $reqDeleteComment->closeCursor();
    }

    //suppression de tous les commentaires d'un épisode
    public function deletePostComments($postCommentsToDelete)
    {
        $db = $this->dbConnect();
        $reqDeletePostComment = $this->bdd->prepare('DELETE FROM comments WHERE id_post = ?');
        $reqDeletePostComment->execute(array($postCommentsToDelete));
        $reqDeletePostComment->closeCursor();
    }

    //liste des commentaires signalés
    public function getReportedComments()
    {
        $db = $this->dbConnect();
        $reqReportedComments = $this->bdd->query('SELECT id, id_post, rank_post, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y\') AS date_comment, reported FROM comments WHERE reported = 1 ORDER BY id');
        $reportedComments = $reqReportedComments->fetchAll();
        $reqReportedComments->closeCursor();
        return $reportedComments;
    }

    //valider un commentaire signalé
    public function okReportedComment($id)
    {
        $db = $this->dbConnect();
        $okReport = $this->bdd->prepare('UPDATE comments SET reported = 0 WHERE id = ?');
        $okReport->execute(array($id));
        $okReport->closeCursor();
    }
}