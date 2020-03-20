<? ob_start(); ?> 
<?php
  echo' <nav>
        <H1>Le blog de Jean Forteroche</H1>      
             <ul class="menu">
                <li><a href="index.php">Chapitres</a></li>
                <li class="bio"><a href="index.php?action=biographie">Biographie</a></li>   
                <li class="connexion"><a href="index.php?action=connexion">Connexion</a></li>   
             </ul>                              
      </nav>';
?>



     
<div class="banniere">
    <h2 class="billet">Billet simple pour l'Alaska</h2>
</div>
<div><p id="intro">Bonjour je suis un écrivain français auteur de plusieurs romans d'aventure. </br> Je vous propose sur mon blog une façon inédite de découvrir mon nouveau roman "Billet simple pour l'Alaska". </br> Chaque semaine je publierai un nouveau chapitre de mon roman gratuitement.</p>                     
</div>    

    </div>
    <p class="commentaire"><a href="index.php">Retour à la liste des billets</a></p>
<div class="news">
    <h3 class="titre">
        <?php echo htmlspecialchars($post['title']); ?>
        <em>le <?php echo $post['creation_date']; ?></em>
       
    </h3>
   
    <p>
    <?php
  
    echo nl2br(($post['content']));
    ?>   
   
   <h2 >Commentaires</h2>
 
</div>
<?php

while ($comment = $comments->fetch())  
{
 ?>
 
  <p class="auteur"><strong><?php echo htmlspecialchars(ucfirst($comment['author'])); ?></strong> le <?php echo $comment['comment_date']; ?></p>

  
 

<div class="signaler">   
<p class="textcommentaire"><?php echo nl2br(htmlspecialchars(($comment['comment']))); ?></p>

<p id="signaler"><a href="index.php?action=reportComment&amp;id=<?php echo $comment['id']?>&postid=<?php echo $_GET['id']?>">signaler</a></p>



</div>


<?php 
} 
$comments->closeCursor();

?>



<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>