 <!DOCTYPE html >
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>       
        <title>CRUD</title>  
        </head>      
    <body>
  

<br/>
<form method="post" action="">
    <strong>Modification du titre du billet</strong>
    <br/>
<textarea rows="2" cols="60" name="title"><?php echo $sqeditpo['title']; ?></textarea>                   
<br/>
<strong>Modification du billet</strong>
<br/>
<textarea rows="10" cols="500" name="content" id="commentaire" ><?php echo $sqeditpo['content']; ?></textarea>                         


<input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
<input type="submit" name="submit">
<a class="btn" href="index.php?action=admin">Retour</a>                  


</form>
 
</body>
</html>

