<?php
    require_once 'BaseModel.php';

    class SectionModel extends BaseModel
    {
      function getSections(){
        $query = $this->db->prepare("SELECT id_seccion, nombre_seccion FROM seccion");
        $query->execute();
        return $query->fetchAll();
      }

      function saveSection($section){
        $query = $this->db->prepare('INSERT INTO seccion(nombre_seccion)
                                     VALUES (:section)');
        $query->bindParam(':section', $section);
        return $query->execute();
      }

    }


 ?>
