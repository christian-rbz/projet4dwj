<?php

session_start();
require_once('model/postManager.php'); 
require_once('model/commentManager.php');


function listPosts()
{
    $managerP=new PostManager();
    $posts=$managerP->getPosts();
    require('view/frontend/listPostsView.php');
    
}

function post()
{
    $managerPost=new PostManager();
    $commentPost=new CommentManager();
    $post=$managerPost->getPost($_GET['id']);
    $comments= $commentPost->getComments($_GET['id']);  
    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
     $addCom=new CommentManager();
     $affectedLines=$addCom-> postComment($postId, $author, $comment);  
 
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}



function listPosts2($erreur3)
{
   $managerP=new PostManager();
   $posts=$managerP->getPosts();
   require('view/frontend/listPostsView.php');
   // header('location:index.php?erreur='.$erreur3);
}