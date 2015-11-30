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
        // if(isset($_POST['tarea']))
        //   return $this->model->agregarTarea($_POST['tarea']);
        break;
      case 'PUT':
        // if(count($this->args) > 0)
        //   return $this->model->realizarTarea($this->args[0]);
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
        // if(isset($_POST['tarea']))
        //   return $this->model->agregarTarea($_POST['tarea']);
        break;
      case 'PUT':
        // if(count($this->args) > 0)
        //   return $this->model->realizarTarea($this->args[0]);
        break;
      default:
            return 'Verbo no soportado';
        break;
    }
  }
}

?>
