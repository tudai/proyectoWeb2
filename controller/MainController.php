<?php

require_once 'BaseController.php';
require_once 'view/MainView.php';

class MainController extends BaseController{


	function __construct(){
		parent::__construct();
	}

	function showHome(){
		$params[ConfigApp::$VIEW_CONTENT] = ConfigApp::$VIEW_TEMPLATE_BASEPATH . ConfigApp::$ACTION_DEFAULT . ConfigApp::$VIEW_TPL_EXT;
		
		$this->view->show(ConfigApp::$VIEW_BASE_TEMPLATE, $params);
	}
	
	function getHome(){
		$params[ConfigApp::$VIEW_CONTENT] = ConfigApp::$VIEW_TEMPLATE_BASEPATH . ConfigApp::$ACTION_DEFAULT . ConfigApp::$VIEW_TPL_EXT;
		$params['books'] = $this->getBooks();
		return $this->view->getHTML(ConfigApp::$VIEW_BASE_TEMPLATE, null, $params);
	}

	function getContent($content){
		return $this->view->getHTML($content);

	}

	function getSections(){
		return $this->model->getSections();
	}


	function getBooksList($content){
		$arr = $this->getBooks();
		return $this->view->getHTML($content, null, $arr);
	}
	
	private function getBooks(){
		$books = $this->model->getBooks();
		return $books;
	}
	

}
