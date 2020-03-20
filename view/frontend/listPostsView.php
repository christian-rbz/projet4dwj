<?php ob_start();?>
<?php
  
echo'      
     <nav>
        <H1>Le blog de Jean Forteroche</H1>      
             <ul class="menu">
                <li><a href="#chapitres">Chapitres</a></li>
                <li class="bio"><a href="index.php?action=biographie">Biographie</a></li>   
                <li class="connexion"><a href="index.php?action=connexion">Connexion</a></li>   
             </ul>                              
      </nav>';               
?>

<?php  if(isset($erreur3)){
                  echo '<font color="black">'. $erreur3.'</font>'; }
?>   


<div class="banniere">
            <h2 class="billet">Billet simple pour l'Alaska</h2>              
</div>
            <div><p id="intro">Bonjour je suis un écrivain français auteur de plusieurs romans d'aventure. </br> Je vous propose sur mon blog une façon inédite de découvrir mon nouveau roman "Billet simple pour l'Alaska". </br> Chaque semaine je publierai un nouveau chapitre de mon roman gratuitement.</p>  
                                                   
            </div>    

</div>
<p class="publication">Chapitres</p>

<?php

while ($data = $posts->fetch())
{
    ?>
<div class="news" id="chapitres">
    <h3 class="titre">
        <?php echo htmlspecialchars($data['title']); ?>
        <em>le <?php echo htmlspecialchars($data['creation_date']); ?></em>
       
    </h3>
       
   <p>
     <?php           
           echo nl2br($data['content']); ?>     

      <div id=commentRead>
      <div class="comment" ><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></div>
      <div class="comment" ><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite</a></div>
      </div>
    </p>               
     
      
</div>
<?php
} 

$posts->closeCursor();
 
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>