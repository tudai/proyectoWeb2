<?php
include_once 'view/MainView.php';
include_once 'model/BaseModel.php';

class MainController{

	private $model;
	private $view;


	function __construct(){
		$this->model = new BaseModel();
		$this->view = new MainView();
	}

	function showHome(){
		$this->view->show(ConfigApp::$ACTION_DEFAULT);
	}

	function getContent($content){
		return $this->view->getHTML($content);

	}

	function getSections(){
		return $this->model->getSections();
	}

	function addSection(){
		if (isset($_REQUEST['bookSectSelector'])){
			$result = $this->model->saveSection($_REQUEST['bookSectSelector']);
			if ($result){
				return "Se agregó la seccion con exito";
			}
			else {
				return "Se ha encontrado un problema al agregar la seccion";
			}
		}

	}

	function addBook(){

		if (isset($_REQUEST['bookName']) && isset($_FILES['bookToUpload']) && isset($_FILES['bookImageToUpload'])){
			$book = new stdClass; //se crea el objeto libro para guardar el libro en la base de datos
			$book->name = $_REQUEST['bookName'];
			$book->author = $_REQUEST['bookAuthor'];
			$book->section = $_REQUEST['bookSection'];

			 $result = $this->model->saveBook($book, $_FILES['bookToUpload'], $_FILES['bookImageToUpload']);
			if ($result){
				return "Se agregó el libro con exito";
			}
			else {
				return "Se ha encontrado un problema al agregar el libro. Te faltó subir algo";
			}
		}
	}
}
