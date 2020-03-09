<?php

require_once 'view/View.php';

class Router
{
  private $ctrl;
  private $view;

  public function routeReq(){

    try {

      /*chargement automatique des classes du dossier model*/
      spl_autoload_register(function($class){
        require_once('model/'.$class.'.php');
      });

      /*on crée une variable $url*/
      $url = '';

      /*on va determiner le controleur en fonction de la valeur de cette variable*/
      if (isset($_GET['url'])) {
        /*on decompose l'url et on lui applique un filtre*/
        $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

        /*on recupere le premier parametre de url
        on le met tout en miniscule
        on met sa premiere lettre en majuscule*/
        $controller = ucfirst(strtolower($url[0]));

        $controllerClass = "Controller".$controller;

        /*on retrouve le chemin du controleur voulu*/
        $controllerFile = "controller/".$controllerClass.".php";

        /*on verifie si le fichier du controleur existe*/
        if (file_exists($controllerFile)) {
          /*on lance la classe en question
          avec tous les parametres url
          pour respecter l'encapsulation*/
          require_once($controllerFile);
          $this->ctrl = new $controllerClass($url);
        }
        else {
          throw new \Exception("Page introuvable", 1);

        }
      }

      else {
        require_once('controller/ControllerAccueil.php');
        $this->ctrl = new ControllerAccueil($url);
      }

    } catch (\Exception $e) {
      $errorMsg = $e->getMessage();
      $this->_view = new View('Error');
      $this->_view->generate(array('errorMsg' => $errorMsg));
    }
  }

}


 ?>