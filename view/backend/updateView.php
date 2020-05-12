<?php $title = 'le blog de Jean Forteroche'; ?>

<section class="header_update">
    <h1>Modifier un chapitre</h1>
    <a class="nav_home_update" href="index.php?action=admin">Retour</a>
    <a class="nav_chapters" href="index.php?action=admin_chapters">Chapitres</a>
</section>

<section class="change_chapter">
    <form class="chapter_form_update" action="index.php?action=update&id=<?= $_GET['id'] ?>" method="post">
        <input class="title" type="text" name="title" placeholder="Titre du chapitre" id="title" value="<?= $chapter->getTitle() ?>"><br/>
        <textarea class="chapter" id="mytextarea" name="content" id="content" cols="30" rows="10" ><?= $chapter->getContent() ?></textarea><br/>
        <input class="submit" type="submit" name="published" placeholder="Publier" id="published"><br/> 
    </form>  
</section>