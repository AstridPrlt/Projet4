<?php
namespace OCR\P4\model;

class PostSetup {
    private $_id;
    private $_title;
    private $_postDate;
    private $_content;

    public function getId()
    {
        return $this->_id;
    }
    public function setId($_id) 
    {
        $_id = (int) $_id;
        if($_id > 0){
        $this->_id = $_id;
        }
    }

    public function getTitle()
    {
        return $this->_title;
    }
    public function setTitle($_title) 
    {
        if(is_string($_title)) {
        $this->_title = $_title;
        }
    }
    
    public function getPostDate()
    {
        return $this->_postDate;
    }
    public function setPostDate($_postDate) 
    {
        $this->_postDate = $_postDate;
    }

    public function getContent()
    {
        return $this->_content;
    }
    public function setContent($_content) 
    {
        if(is_string($_content)) {
        $this->_content = $_content;
        }
    }
}