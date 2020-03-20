<?php

require_once("model/manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
    $db = $this->dbConnect();
    $req= $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
    return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();            
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));    
        return $affectedLines;
    }

    public function addPosts()
    {
        $db = $this->dbConnect();
        $sqposts=$db->query('SELECT * FROM posts ORDER BY id DESC'); 
        return $sqposts;
    }

    public function deletePost($idPost)
    {
        $db = $this->dbConnect();
        $delPos =$db->prepare("DELETE FROM posts  WHERE id = ?");
        $delPos->execute(array($idPost));
        $delPost=$delPos->fetch();
        return $delPost;
    }

}