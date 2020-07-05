<?php
namespace OCR\P4\model;

class CommentSetup {
    private $_id;
    private $_postId;
    private $_author;
    private $_commentDate;
    private $_comment;

    public function getId()
    {
        return $this->_id;
    }
    public function setId($_id)
    {
        $_id = (int) $_id;
        if($_id > 0) {
        $this->_id = $_id;
        }
    }

    public function getPostId()
    {
        return $this->_postId;
    }
    public function setPostId($_postId)
    {
        $_postId = (int) $_postId;
        if($_postId > 0) {
        $this->_postId = $_postId;
        }
    }

    public function getAuthor()
    {
        return $this->_author;
    }
    public function setAuthor($_author)
    {
        if(is_string($_author)) {
        $this->_author = $_author;
        }
    }

    public function getCommentDate()
    {
        return $this->_commentDate;
    }
    public function setCommentDate($_commentDate)
    {
        $this->_commentDate = $_commentDate;
    }

    public function getComment()
    {
        return $this->_comment;
    }
    public function setComment($_comment)
    {
        if(is_string($_comment)) {
        $this->_comment = $_comment;
        }
    }
}