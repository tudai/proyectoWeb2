<?php
    require_once 'BaseModel.php';

class SectionModel extends BaseModel {
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

    function delete($id){
    	$query = $this->db->prepare('SELECT COUNT(id_libro) FROM libro WHERE seccion_id_seccion = :id_section');
    	$query->bindParam(':id_section', $id);
    	$query->execute();
    	$count =  $query->fetchColumn();
    	if ($count == 0){
    		$query = $this->db->prepare('DELETE FROM seccion WHERE id_seccion = :id_section');
    		$query->bindParam(':id_section', $id);
    		return $query->execute();
    	} else
    		return false;

    }

    function update($section){
      $query = $this->db->prepare('UPDATE seccion SET nombre_seccion = :nombre WHERE id_section = :id_seccion');
      $query->bindParam(':nombre', $obj);
      $query->bindParam(':id_seccion', $id);
      $query->execute();

    }

}


 ?>
