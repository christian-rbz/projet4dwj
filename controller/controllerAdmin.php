<?php

function admin()
{
    $sessionConnect = sessionConnect();
    ob_start();
    include("view/backend/adminView.php");
    $content = ob_get_clean();
    require("view/backend/template.php");
}

// Gestion des chapitres 
function admin_chapters()
{
    $sessionConnect = sessionConnect();

    
    $chapterManager = new ChaptersManager(); 
    $chapter = $chapterManager->getList(); 


    // conditions pour publier nouveau chapitre
    if (isset($_POST['title']) && isset($_POST['content']) && !empty($_POST['title']) && !empty($_POST['content'])) 
    { 
        $chapters = new Chapters([
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ]);
        $chapterManager->addChapter($chapters); 
        $_SESSION['flash']['danger'] = 'Votre chapitre vient d\'être publié' . '<br/>'; 

        header('Location: index.php?action=admin_chapters');
        exit();
    }

     // pour supprime un chapitre 
    if (isset($_GET['deleteChapter']) ) {
        
        $chapterDelete = new Chapters(['id' => $_GET['id']]);
        
        $chapitreManager = new ChaptersManager();
        $commentsManager = new CommentsManager();

        $reponse = $commentsManager->deleteAllCommentsChapter($chapterDelete->getId());
       
        $chapitreManager->deleteChapter($chapterDelete);

        $_SESSION['flash']['danger'] = 'Le chapitre a bien été supprimé' . '<br/>';  

        header('Location: index.php?action=admin_chapters');
        exit(); 
    }
    
    ob_start();
    include("view/backend/admin_chaptersView.php");
    $content = ob_get_clean();
    require("view/backend/template.php");
}



// gestion des commentaires 
function admin_comments()
{
    $sessionConnect = sessionConnect();


    $commentManager = new CommentsManager();
    $comment = $commentManager->getList();


    $commentSigManager = new CommentsManager();
    $commentSignaled = $commentSigManager->getListSignaled();

    // pour supprimer un commentaire 
    if (isset($_GET['delete'])) {
        $commentsDelete = new Comments(['id' => $_GET['id'] ]);
        $commentsManager = new CommentsManager();
        $commentsManager->deleteComment($commentsDelete);
        $_SESSION['flash']['danger'] = 'Le commentaire a bien été supprimé' . '<br/>';  
        header('Location: index.php?action=admin_comments');
        exit();
    }

    // pour enlever un signalement du commentaire (nbre signalement-1)
    if (isset($_GET['deleteSignal'])) {
        $commentsDelete = new Comments([
            'id' => $_GET['id']
        ]);
        $commentsManager = new CommentsManager();
        $commentsManager->deleteSignal($commentsDelete);
        $_SESSION['flash']['danger'] = 'Le signalement a bien été supprimé' . '<br/>';  

        header('Location: index.php?action=admin_comments');
        exit();
    }



    ob_start();
    include("view/backend/admin_commentsView.php");
    $content = ob_get_clean();
    require("view/backend/template.php");
}



function logout()
{
    unset($_SESSION['user']);
    session_destroy();
    header('Location: index.php?action=login');
    exit();
}


function update()
{
    $sessionConnect = sessionConnect();

    $chapterManager = new ChaptersManager(); 
    $chapter = $chapterManager->get($_GET['id']);  

    // ajouter le changement a la bdd dans le chapitre existant
    if (isset($_POST['title']) or isset($_POST['content'])) {
        $chapter = new Chapters([
            'id' => $_GET['id'],
            'title'  => $_POST['title'],
            'content' => $_POST['content']
        ]);
        $chapterManager = new ChaptersManager();
        $chapterManager->updateChapter($chapter);
        $_SESSION['flash']['danger'] = 'Votre chapitre a bien été modifié' . '<br/>';  

        header('Location: index.php?action=admin_chapters&id=' . $_GET['id']);
        exit();
    }

    // creation des variables pour la updateView
    $chapterTitleUpdate = $chapter->getTitle();
    $chapterContentUpdate = $chapter->getContent();

    ob_start();
    include("view/backend/updateView.php");
    $content = ob_get_clean();
    require("view/backend/template.php");
}

function sessionConnect()
{
    if (!isset($_SESSION['user'])) {
        header('Location: index.php?action=login');
        exit();
    }
}

