<header class="index_header">
    <a href="index.php?action=home"><h1>Accueil</h1></a>
    <a href="index.php?action=logout"><h3>Déconnexion<h3></a> 
</header>

<section class="header_admin">
    <h1>Chapitres</h1>
    <a class="nav_home_comments" href="index.php?action=admin">Retour</a>
    <a class="nav_chapters" href="index.php?action=admin_chapters">Chapitres</a>
</section>

<section class="admin_chapters">

    <h1>Ecrire un nouveau chapitre</h1>
       <!-- message succès quand chapitre a été créé -->
    <?php if(isset($_SESSION)) { 
            include('view/flashMessages.php');
    } ?>

    <form class="chapter_form" action="index.php?action=admin_chapters" method="post">
        <input class="title" type="text" name="title" placeholder="Titre du chapitre" id="title"><br/>
        <textarea class="chapter" id="mytextarea" name="content" placeholder="Votre texte" id="content" cols="30" rows="10"></textarea><br/>
        <input class="submit" type="submit" name="published" placeholder="Publier" id="published"><br/> 
    </form>    
</section>

<section class="admin_chapters" id="editChapters_backend"> 
    <h1>Editer un chapitres</h1>                      
    <?php if (!empty($chapter))
    { foreach ($chapter as $cle => $elements) { ?>
        <div class="chapters_published">
        <h3><?= $elements['title'] ?></h3><br/>
        <p><?= $elements['content'] ?></p>
        <a href="index.php?action=update&id=<?= $elements['id'] ?>">Modifier le texte </a><i class="fas fa-edit"></i>
        <a href="index.php?action=admin_chapters&id=<?= $elements['id'] ?>&deleteChapter">Supprimer le chapitre <i class="fas fa-times"></i></a></p><br/>
        </div>   
        <?php } 
    } ?>               
</section>


