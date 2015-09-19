<?php
class BaseModel {

  private $tareas;
  private $db;

  function __construct() {
      $this->db = new PDO('mysql:host=192.168.0.15;dbname=web2dai;charset=utf8', 'web2dai', 'web2dai');
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }


}
?>
