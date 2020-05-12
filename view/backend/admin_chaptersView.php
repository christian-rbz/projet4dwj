<?php $title = 'le blog de Jean Forteroche'; ?>

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
    <form class="chapter_form" action="index.php?action=admin_chapters" method="post">
        <input class="title" type="text" name="title" placeholder="Titre du chapitre" id="title"><br/>
        <textarea class="chapter" id="mytextarea" name="content" placeholder="Votre texte" id="content" cols="30" rows="10"></textarea><br/>
        <input class="submit" type="submit" name="published" placeholder="Publier" id="published"><br/> 
    </form>    
</section>

<section class="edit_chapters"> 
    <h1>Editer un chapitres</h1>                      
    <?php if (!empty($chapter))
    { foreach ($chapter as $cle => $elements) { ?>
        <div class="chapters_published">
        <h3><?= $elements->getTitle() ?></h3><br/>
        <p><?= $elements->getContent() ?></p>
        <a href="index.php?action=update&id=<?= $elements->getId() ?>">Modifier le texte</a>
        </div>   
        <?php } 
    } ?>               
</section>

