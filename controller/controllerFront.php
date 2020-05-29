<?php

// page accueil qui se met si les autres conditions ne sont pas faites
function home()
{   
    $chapterManager = new ChaptersManager();

    // compte les chapitres dans la table
    $nbChapter = $chapterManager->getCount();
    $nbArt = $nbChapter;
    $perPage = 5;
    $nbPage = ceil($nbArt / $perPage);

    // pagination si il y'a trop de chapitres  sur 1 page
    if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPage) {
        $cPage = $_GET['p'];
    } else {
        $cPage = 1;
    }

    $perPage2 = (($cPage - 1) * $perPage);

    // chapitres par page
    $chapters = $chapterManager->getChapterForPagination($perPage2, $perPage);

    ob_start();
    include('view/frontend/indexView.php');
    $content = ob_get_clean();
    require("view/frontend/template.php");
}

function chapter()
{
    // prend tous les informations des chapitres  
    $chapterManager = new ChaptersManager(); 
    $chapter = $chapterManager->get($_GET['id']); 

    // creer un commentaire
    if (isset($_POST['pseudo']) && isset($_POST['comment']) && !empty($_POST['pseudo']) && !empty($_POST['comment'])) 
    {
        $comment = new Comments([
            $_GET['id'],
            $_POST['pseudo'],
            $_POST['comment'],
        ]);
        $commentChapter = new CommentsManager();
        $commentChapter->getAdd($comment);
        
        header('Location: index.php?action=chapter&id=' . $_GET['id']);
        exit();
    }

    // prend tous les commentaires a propos du chapitre cliqué
    $commentChapter = new CommentsManager();
    $commentedChapter = $commentChapter->getChapterComment($_GET['id']);
    $_SESSION['flash']['danger'] = '';

    // informe a lespace administration quil ya un commentaire
    if (isset($_GET['signaled'])) {
        $comments = new Comments([
            'id' => $_GET['idComment']
        ]);

        $commentChapter->getSignal($comments);
        $_SESSION['flash']['danger'] = $_SESSION['flash']['danger'] . 'Ce commentaire a bien été signalé à l\'administrateur' . '<br/>';  
    }

    // Traitement de variables pour le view
    $chapterTitle = htmlspecialchars_decode($chapter->getTitle());
    $chapterContent = htmlspecialchars_decode($chapter->getContent());
    $chapterId = $chapter->getId();


    ob_start();
    include('view/frontend/chapterView.php');
    $content = ob_get_clean();
    require("view/frontend/template.php");
}

function login()
{
    // connexion à l'espace administrateur
    if (!empty($_POST)) {
        $validation = false;
        $profil = new User([
            'email' => $_POST['email']
        ]);

        $profilAcount = new UserManager();
        $profilManager = $profilAcount->getConnect($profil);

        $_SESSION['flash']['danger'] = '';
        

        $hash = $profilManager->getPassword();;

        if (password_verify($_POST['password'], $hash)) {
            $validation = true;
        } else {
            $validation = false;
        }
       
        if ($validation === true) {
            $_SESSION['user'] = $profilManager->getId();
            $_SESSION['identifiant'] = $profilManager->getIdentifiant();
            $_SESSION['email'] = $profilManager->getEmail();
            $_SESSION['password'] = $profilManager->getPassword();

            header('Location: index.php?action=admin');
            exit();
        } else {
            $_SESSION['flash']['danger'] = $_SESSION['flash']['danger'] . "L'identifiant ou le mot de passe est incorrect." . '<br/>';
        }
    } 

    ob_start();
    include('view/frontend/loginView.php');  
    $content = ob_get_clean();
    require("view/frontend/template.php");
}

// page biographie de l'auteur (faire le css)
function biography () {
    include('view/frontend/biography.php');
    $content = ob_get_clean();
    require("view/frontend/template.php");
}

