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

    // prend le chapitre dans le but de le modifier
    $chapterManager = new ChaptersManager(); 
    $chapter = $chapterManager->getList(); 

    // prend tous les informations du nouveau chapitres  
    if (isset($_POST['title']) && isset($_POST['content']) && !empty($_POST['title']) && !empty($_POST['content'])) 
    { 
        $chapters = new Chapters([
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ]);
        $chapterManager->addChapter($chapters); 
        $_SESSION['flash']['danger'] = $_SESSION['flash']['danger'] . 'Votre chapitre vient d\'être publié' . '<br/>'; 

        header('Location: index.php?action=admin_chapters');
        exit();
    }

     // supprime les commentaires 
    if (isset($_GET['deleteChapter'])) {
        $chapterDelete = new Chapters([
            'id' => $_GET['id']
        ]);
        $commentsManager = new ChaptersManager();
        $commentsManager->deleteChapter($chapterDelete);
        $_SESSION['flash']['danger'] = $_SESSION['flash']['danger'] . 'Le chapitre a bien été supprimé' . '<br/>';  

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

    // tableau pour prendre tous les commentaires et titre de chapitre  
    $commentManager = new CommentsManager();
    $comment = $commentManager->getList();

    // prend tous les commentaires avec les messages d'alertes
    $commentSigManager = new CommentsManager();
    $commentSignaled = $commentSigManager->getListSignaled();

    // supprime les commentaires 
    if (isset($_GET['delete'])) {
        $commentsDelete = new Comments([
            'id' => $_GET['id']
        ]);
        $commentsManager = new CommentsManager();
        $commentsManager->getDelete($commentsDelete);
        $_SESSION['flash']['danger'] = $_SESSION['flash']['danger'] . 'Le commentaire a bien été supprimé' . '<br/>';  
         header('Location: index.php?action=admin_comments');
        exit();
    }

    if (isset($_GET['deleteSignal'])) {
        $commentsDelete = new Comments([
            'id' => $_GET['id']
        ]);
        $commentsManager = new CommentsManager();
        $commentsManager->deleteSignal($commentsDelete);
        $_SESSION['flash']['danger'] = $_SESSION['flash']['danger'] . 'Le signalement a bien été supprimé' . '<br/>';  

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
    // prend chapitre, titre et contenu (bdd) 
    $chapterManager = new ChaptersManager(); 
    $chapter = $chapterManager->get($_GET['id']);  

    // ajouter le changement a la bdd dans un chapitre existant
    if (isset($_POST['title']) or isset($_POST['content'])) {
        $chapter = new Chapters([
            'id' => $_GET['id'],
            'title'  => $_POST['title'],
            'content' => $_POST['content']
        ]);
        $chapterManager = new ChaptersManager();
        $chapterManager->update($chapter);
        $_SESSION['flash']['danger'] = $_SESSION['flash']['danger'] . 'Votre chapitre a bien été modifié' . '<br/>';  

        header('Location: index.php?action=admin_chapters&id=' . $_GET['id']);
        exit();
    }

    // je créer mes variables pour la updateView
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

