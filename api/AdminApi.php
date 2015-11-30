<?php
require_once 'api_base.php';
require_once '../model/BookModel.php';
require_once '../model/SectionModel.php';

class AdminApi extends ApiBase {
  private $bookModel;
  private $sectionModel;

  function __construct($request){
    parent::__construct($request);
    $this->bookModel  = new BookModel();
    $this->sectionModel = new SectionModel();
  }


  function book(){
    switch ($this->method) {
      case 'GET':
      	return $books = $this->bookModel->getBooks();

        break;
      case 'DELETE':
        if(count($this->args) > 0)
           return $this->bookModel->delete($this->args[0]);
        break;
      case 'POST':
      	if (isset($_REQUEST['bookName']) && isset($_FILES['bookToUpload']) && isset($_FILES['bookImageToUpload'])){
      		$book = new stdClass; //se crea el objeto libro para guardar el libro en la base de datos
      		$book->name = $_REQUEST['bookName'];
      		$book->author = $_REQUEST['bookAuthor'];
      		$book->section = $_REQUEST['bookSection'];
      		$result = $this->bookModel->saveBook($book, $_FILES['bookToUpload'], $_FILES['bookImageToUpload']);
      		if ($result){
      			return "Se agregó el libro con exito";
      		}
      		else {
      			return "Se ha encontrado un problema al agregar el libro. Te faltó subir algo";
      		}
      	}
        break;
      case 'PUT':
         return $this->bookModel->update($this->args);
        break;
      default:
            return 'Verbo no soportado';
        break;
    }
  }

  function section(){
   switch ($this->method) {
      case 'GET':
      	return $this->sectionModel->getSections();
        break;
      case 'DELETE':
         if(count($this->args) > 0)
           return $this->sectionModel->delete($this->args[0]);
        break;
      case 'POST':
        	if (isset($_REQUEST['sectionAdd'])){
            return $this->sectionModel->saveSection($_REQUEST['sectionAdd']);
          }
        break;
      case 'PUT':
          return $this->sectionModel->update($this->args);
        break;
      default:
            return 'Verbo no soportado';
        break;
    }
  }
}

?>
