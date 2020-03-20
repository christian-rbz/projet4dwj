<?php ob_start(); ?> 
<nav>
<H1>Jean Forteroche</H1>
<a href="index.php"><div id="connexion">Connexion</div></a>
                       
                <ul class="menu">
                   <li class="inscript"><a href="index.php?action=subscribe">Inscription</a></li>                  
                   <li><a href="index.php">Chapitres</a></li>
                </ul>
               <?php  if(isset($erreur2)){
         echo '<font color="white">'. $erreur2.'</font>';  }
     ?>
</nav>

<form id="connex" action="index.php?action=connex" method="POST">
    <label id="mailconnexion" for="mail" >E mail</label>
    <input  type="email" name="email" id="mail2"/>
    <label id="mdpconnexion" for="motdepasse" >Mot de passe</label>
    <input  type="password" name="pass" id="motdepasse22"/>
   <input type="submit" id="submit2" name="submitConnex" value="se connecter" >
</form> 

               <?php
               if(isset($erreur)){
    echo '<font color="white">'. $erreur.'</font>'; }?> 
               </div>
              

 
<?php $content = ob_get_clean(); ?>
 <?php require('view/frontend/template.php');?>