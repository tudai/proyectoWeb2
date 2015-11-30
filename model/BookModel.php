<?php

require_once 'BaseModel.php';

class BookModel extends BaseModel{
	
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

      
      private function removeBookFolder($path){
      	$divisor = strripos($path, "/");
      	$path = substr($path, 0, $divisor);
      	$files = glob($path . "/*");
      	
      	foreach($files as $file){
      		$result = unlink($file);
      		if (!$result)
      			return false;
      	}
      
      	return rmdir($path);
      }
      
      function getBooks(){
         $query = $this->db->prepare("SELECT * FROM libro");
         $query->execute();
         return $query->fetchAll();
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
        return $query->execute();
      }

      function getBookBySectionID($id){
        $query = $this->db->prepare('SELECT nombre_libro, autor_libro FROM libro WHERE seccion_id_seccion = :idsection');
        $query->bindParam('idsection', $id);
        $query->execute();
        return $query->fetchAll();
      }


      function delete($id){
      	$query = $this->db->prepare('SELECT img_libro FROM libro WHERE id_libro = :id_libro');
      	$query->bindParam(':id_libro', $id);
      	$query->execute();
      	$path = $query->fetch();

      	$result = $this->removeBookFolder($path[0]);
      	
      	if ($result){
      		$query = $this->db->prepare('DELETE FROM libro WHERE id_libro = :id_libro');
      		$query->bindParam(':id_libro', $id);
      		return $query->execute();
      	} else
      		return $result;
      	
      }
      
      
      
      function update($obj){
      	
      }

}


 ?>
