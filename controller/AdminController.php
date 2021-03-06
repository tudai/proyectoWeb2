<?php

require_once 'BaseController.php';

class AdminController extends BaseController{

	function __construct(){
		parent::__construct();
	}

	function addSection(){
		if (isset($_REQUEST['sectionInput'])){
			$result = $this->modelSection->saveSection($_REQUEST['sectionInput']);
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

			$result = $this->modelBook->saveBook($book, $_FILES['bookToUpload'], $_FILES['bookImageToUpload']);
			if ($result){
				return "Se agregó el libro con exito";
			}
			else {
				return "Se ha encontrado un problema al agregar el libro. Te faltó subir algo";
			}
		}
	}

	function getContent($args){
		$sections = $this->modelSection->getSections();
		$arr = array('sections' => $sections);
		return $this->view->getHTML($args['tpl'], null, $arr);
	}


	function login(){
		$params[ConfigApp::$VIEW_CONTENT] = ConfigApp::$VIEW_TEMPLATE_BASEPATH . ConfigApp::$ACTION_DEFAULT . ConfigApp::$VIEW_TPL_EXT;
		$params[ConfigApp::$VIEW_NAV] = ConfigApp::$VIEW_COMPONENT_BASEPATH . ConfigApp::$VIEW_NAV_ADMIN . ConfigApp::$VIEW_TPL_EXT;
		return $this->view->getHTML(ConfigApp::$VIEW_BASE_TEMPLATE, null, $params);
	}

}
