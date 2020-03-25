<?php

class Post
{

  private $_id;
  private $_title;
  private $_content;
  private $_date;

  public function __construct(array $data){
    $this->hydrate($data);
  }

  /*hydratation*/
  public function hydrate(array $data){
    foreach ($data as $key => $value) {
      $method = 'set'.ucfirst($key);
      
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

  /*setters*/

  public function setId($id)
  {
    $id = (int) $id;
    if ($id > 0) {
      $this->_id = $id;
    }
  }

  public function setTitle($title)
  {
    if (is_string($title)) {
      $this->_title = $title;
    }
  }

  public function setContent($content)
  {
    if (is_string($content)) {
      $this->_content = $content;
    }
  }

  public function setDate($date)
  {
      $this->_date = $date;

  }

  /*getters*/
  public function getId(){return $this->_id;}
  public function getTitle(){return $this->_title;}
  public function getContent(){return $this->_content;}
  public function getDate(){return $this->_date;}

  //Les Fonctions supplémentaire

}