<?php

//class PostManager extends Manager {

    //liste des posts
    function getPosts()
    {
        require 'manager.php';

        $reqPosts = $bdd->query('SELECT * FROM posts');

        return $reqPosts;
    }

    //gestion d'un post précis
    //function getPost()

    function getPost()
    {
        require 'manager.php';

        $reqPostId = $bdd->prepare('SELECT * FROM posts WHERE id=?');
        $reqPostId->execute(array($_GET['id']));
        return $reqPostId;
    }
//}

?>
