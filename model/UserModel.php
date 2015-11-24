<?php
  require_once 'BaseModel.php';

  class UserModel extends BaseModel
  {

    function getUserCredentials($username, $password){
      $query = $this->db->prepare('SELECT * FROM usuarios WHERE username = :username  AND password = :password');
      $query->bindParam(':username', $username);
      $query->bindParam(':password', md5($password));
      $query->execute();
    	return $query->fetchAll();
    }
  }

 ?>
