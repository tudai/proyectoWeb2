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
		$params['books'] = $this->buildBooksForTable();
		return $this->view->getHTML(ConfigApp::$VIEW_BASE_TEMPLATE, null, $params);
	}

	/*
	 * Retorna una tpl cuyo nombre esta dato por $content
	 * */
	function getContent($args){
		return $this->view->getHTML($args['tpl']);
	}

	function getSections(){
		return $this->modelSection->getSections();
	}

}
