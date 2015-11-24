<?php
    require_once 'BaseModel.php';

    class BookModel extends BaseModel
    {
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


    }


 ?>
