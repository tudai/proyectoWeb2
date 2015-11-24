<?php

require_once 'config/db_params.php';

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
