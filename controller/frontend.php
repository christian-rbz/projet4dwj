<?php
//Include
require("class/articlesClass.php");
require_once("model/articlesModel.php");


function afficher_article(){
	//Ton traitement
	$ArticleManager = new articlesManager();
	$reponseArticle = $ArticleManager->unArtcle('1');


	$article = new article($reponseArticle);

	$titleArticle = $article->getTitle();


	$title = "Artilces" ; 
	//Appel de vue
	require ("view/ViewAccueil.php");
}



?>