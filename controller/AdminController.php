<?php

require_once 'BaseController.php';

class AdminController extends BaseController{

	function __construct(){
		parent::__construct();
	}

	function addSection(){
		if (isset($_REQUEST['inputSection'])){
			$result = $this->model->saveSection($_REQUEST['inputSection']);
			if ($result){
				return "Se agregó la seccion con exito";
			}
			else {
				return "Se ha encontrado un problema al agregar la seccion";
			}
		}
	}

	function addCategory(){
		if (isset($_REQUEST['categoryInput'])){
			$result = $this->model->saveCategory($_REQUEST['categoryInput']);
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
			$book->category = $_REQUEST['bookCategory'];

			$result = $this->model->saveBook($book, $_FILES['bookToUpload'], $_FILES['bookImageToUpload']);
			if ($result){
				return "Se agregó el libro con exito";
			}
			else {
				return "Se ha encontrado un problema al agregar el libro. Te faltó subir algo";
			}
		}
	}


	function getContent($content){
		$sections = $this->model->getSections();
		$categories = $this->model->getCategories();

		$arr = array('sections' => $sections, 'categories' => $categories);
		return $this->view->getHTML($content, null, $arr);
	}


	function getBooks($content){
		$books = $this->model->getBooks();
		$arr = array('libros' => $books);
		return $this->view->getHTML($content, null, $arr);
	}
}
