<?php
require_once 'api_base.php';
require_once '../model/BaseModel.php';
require_once '../model/BookModel.php';

class BooksApi extends ApiBase {
  private $model;

  function __construct($request){
    parent::__construct($request);
    $this->modelBook = new BookModel();
  }

  function bookApi(){
    switch ($this->method) {
      case 'GET':
        return $this->modelBook->getBooks();

        break;
      case 'DELETE':
        if(count($this->args) > 0)
          return $this->model->borrarTarea($this->args[0]);
        break;
      case 'POST':
        if(isset($_POST['tarea']))
          return $this->model->agregarTarea($_POST['tarea']);
        break;
      case 'PUT':
        if(count($this->args) > 0)
          return $this->model->realizarTarea($this->args[0]);
        break;
      default:
            return 'Verbo no soportado';
        break;
    }
  }
}

?>
