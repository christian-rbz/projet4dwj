       
<section class="chapters_header">
    <h1>Billet simple pour l'Alaska</h1>
    <h2>Jean Forteroche</h2>
</section>

<section class="edit_chapters">      
        <div class="chapters_published">                   
            <h3><?= $chaptireTitle; ?></h3><br/>
            <p><?= $content; ?></p><br/>
            <hr>
            <p class="comments_publication">Commentaires: </p>
            <?php if (!empty($commentedChapter))
            { foreach ($commentedChapter as $cle => $elements) { ?>
                <p>[ <?= $elements->getDateComment() ?> ] Par <?= $elements->getPseudo() ?> (<a href="index.php?action=chapter&id=<?= $chapter->getId() ?>&idComment=<?= $elements->getId() ?>&signaled" class="signal">Signaler</a>): </p><br/> 
                <p class="comment_published"><?= $elements->getComment() ?><br />                                       
                <?php if (isset($_SESSION) AND isset($_GET['signaled']) AND $elements->getSignaled() == 1)  { include('view/flashMessages.php'); } ?>   
                <?php }                    
            } ?> 
        </div>

<div class="comments">
    <h4>Commentaires</h4>
    <form class="comments_form" action="index.php?action=chapter&id=<?= $_GET['id'] ?>" method="post">
        <input class="pseudo" type="text" name="pseudo" placeholder="Pseudo" id="pseudo"><br/>
        <textarea class="comment" name="comment" placeholder="Votre commentaire" id="comment" cols="30" rows="10"></textarea><br/>
        <input class="submit" type="submit" name="submit" placeholder="Envoyer" id="submit"><br/>
    </form>                
</div>

</section>