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

	function addBook(){

		if (isset($_FILES['bookToUpload'])){ //falta el request?
			$book = new stdClass; //se crea el objeto libro para guardar el libro en la base de datos
			$book->name = ($_REQUEST['bookName']);
			$book->description = ($_REQUEST['bookDescrip']);
// falta la url
			$book->section = ($_REQUEST['bookSection']);
			$this->model->saveBook($_FILES['imagesToUpload']);
		}
	}
}
