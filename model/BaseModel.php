<?php

require_once 'config/db_params.php';// ../config/db_params.php funciona para la api, asi no

class BaseModel {

  protected  $book;
  protected  $db;

  protected static $ROOT_FOLDER = 'uploaded/books/';

  function __construct() {
      $this->db = new PDO(DatabaseConfig::$DB_LOCATION, DatabaseConfig::$DB_USER, DatabaseConfig::$DB_PASSWORD);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
}


?>
