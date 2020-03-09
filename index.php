<?php

// require_once('controller/Router.php');

// $router = new Router();

// $router->routeReq();
	
require('controller/frontController.php');



//Routeur
if (isset($_GET['url'])) {


	switch ($_GET['url']) {
		case 'articles':
			afficher_article();
			break;
		
		default:
			# code...
			var_dump("home");
			break;
	}



}







 ?>