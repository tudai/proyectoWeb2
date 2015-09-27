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

	function addBook(){

		if (isset($_REQUEST['bookName']) && isset($_FILES['bookToUpload'])){
			$book = new stdClass; //se crea el objeto libro para guardar el libro en la base de datos
			$book->name = $_REQUEST['bookName'];
			$book->description = $_REQUEST['bookDescrip'];
			$book->section = $_REQUEST['bookSection'];

			return $this->model->saveBook($book, $_FILES['bookToUpload']);
		} else {
			return "no entro nunca al if del orto";
		}
	}
}
