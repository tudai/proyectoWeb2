<?php

require_once 'config/db_params.php';

class BaseModel {

  private  $book;
  private  $db;

  private static $ROOT_FOLDER = 'uploaded/books/';

  function __construct() {
      $this->db = new PDO(DatabaseConfig::$DB_LOCATION, DatabaseConfig::$DB_USER, DatabaseConfig::$DB_PASSWORD);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

 private function uploadBook($fileBook, $fileImage){
  	$folder = $this->prepareFolder($fileBook);
  	move_uploaded_file($fileBook['tmp_name'], $folder . $fileBook['name']);
  	move_uploaded_file($fileImage['tmp_name'], $folder . $fileImage['name']);

  	$paths = array();
  	$paths['base_path'] = $folder;
  	$paths['book_path'] = $folder . $fileBook['name'];
  	$paths['image_path'] = $folder . $fileImage['name'];

    return $paths;
  }


  private function prepareFolder($file){
  	$dir = BaseModel::$ROOT_FOLDER ."/".uniqid().$file['name']."/";
  	if (!file_exists($dir)){
  		mkdir($dir, 0755);
  	}
  	return $dir;
  }

  function getBooks(){
    $query = $this->db->prepare("SELECT nombre_libro, autor_libro, img_libro FROM libro");
    $query->execute();
    return $query->fetchAll();
  }

  function getSections(){
    $query = $this->db->prepare("SELECT id_seccion, nombre_seccion FROM seccion");
    $query->execute();
    return $query->fetchAll();
  }

  function getCategories(){
    $query = $this->db->prepare("SELECT id_categoria, nombre_categoria FROM categoria");
    $query->execute();
    return $query->fetchAll();
  }

  function saveSection($section){
    $query = $this->db->prepare('INSERT INTO seccion(nombre_seccion)
                                 VALUES (:section)');
    $query->bindParam(':section', $section);
    return $query->execute();
  }

  function saveCategory($category){
  	$query = $this->db->prepare('INSERT INTO categoria(nombre_categoria)
                                 VALUES (:categoria)');
  	$query->bindParam(':categoria', $category);
  	return $query->execute();
  }

  function saveBook($book, $fileBook, $fileImage){
	$path = array();
    $path = $this->uploadBook($fileBook, $fileImage);

    $query = $this->db->prepare('INSERT INTO libro(nombre_libro, autor_libro, img_libro, url_libro, seccion_id_seccion)
                                    VALUES(:name, :author, :img, :url, :section)');
    $query->bindParam(':name', $book->name);
    $query->bindParam(':author', $book->author);
    $query->bindParam(':img', $path['image_path']);
    $query->bindParam(':url', $path['book_path']);
    $query->bindParam(':section', $book->section);
    
    if ($query->execute()){
      $query = $this->db->prepare('INSERT INTO categoria_libro(id_fk_libro, id_fk_categoria)
                                    VALUES(:idbook, :idcategory)');
      $id_libro = $this->db->lastInsertId();
      $query->bindParam(':idbook', $id_libro);
      $query->bindParam(':idcategory', $book->category);

      return $query->execute();
    }

  }

  function getUserCredentials($username, $password){
  	$query = $this->db->prepare('SELECT * FROM usuarios WHERE username = :username  AND password = :password');
  	$query->bindParam(':username', $username);
  	$query->bindParam(':password', md5($password));
  	$query->execute();
  	return $query->fetchAll();
  }
}
?>
