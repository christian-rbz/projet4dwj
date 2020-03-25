<?php ob_start(); ?> 


<?php  if(isset($erreur2)){
echo '<font color="black">'. $erreur2.'</font>';  }
?>

<p>Biographie de moi</p>
              

 
<?php $content = ob_get_clean(); ?>
 <?php require('view/frontend/template.php');?>