<?php

require_once  $_SERVER['DOCUMENT_ROOT']."/proyectoWeb2/config/db_params.php";// ../config/db_params.php funciona para la api, asi no

abstract class BaseModel {

  protected  $book;
  protected  $db;

  protected static $ROOT_FOLDER = 'uploaded/books/';

  function __construct() {
      $this->db = new PDO(DatabaseConfig::$DB_LOCATION, DatabaseConfig::$DB_USER, DatabaseConfig::$DB_PASSWORD);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  
  abstract function delete($id);
  
  abstract function update($obj);
  
  /*
  abstract function save();
  
  abstract function get();
  
  abstract function getById();
  */
}


?>
