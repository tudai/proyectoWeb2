<?php
class BaseModel {

  private $book;
  private $db;

  function __construct() {
      $this->db = new PDO('mysql:host=localhost;dbname=web2dai;charset=utf8', 'root', '');
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  function uploadBook($archivo){
    $destino = 'uploaded/books/'.uniqid().$archivo['name'];
    move_uploaded_file($archivo['tmp_name'], $destino);
    return $destino;
  }

  function getSections(){
    $consulta = $this->db->prepare("SELECT * FROM seccion");
    $consulta->execute();
    return $consulta->fetchAll();
  }

  function saveSection($section){
    $query = $this->db->prepare('INSERT INTO seccion(nombre_seccion)
                                 VALUES (:section)');
    $query->bindParam(':section', $section);
    return $query->execute();
  }

  function saveBook($book, $file){
    $ruta = $this->uploadBook($file);
    $consulta = $this->db->prepare('INSERT INTO libro(nombre_libro, descripcion_libro, url_libro, seccion_id_seccion)
                                    VALUES(:name, :description, :url, :section)');
    $consulta->bindParam(':name', $book->name);
    $consulta->bindParam(':description', $book->description);
    $consulta->bindParam(':url', $ruta);
    $consulta->bindParam(':section', $book->section);

    return $consulta->execute();
  }

}
?>
