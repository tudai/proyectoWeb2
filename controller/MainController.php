<?php

require_once 'BaseController.php';
require_once 'view/MainView.php';

class MainController extends BaseController{


	function __construct(){
		parent::__construct();
	}

	function showHome(){
		$params[ConfigApp::$VIEW_CONTENT] = ConfigApp::$VIEW_TEMPLATE_BASEPATH . ConfigApp::$ACTION_DEFAULT . ConfigApp::$VIEW_TPL_EXT;
		$params[ConfigApp::$VIEW_NAV] = ConfigApp::$VIEW_COMPONENT_BASEPATH . ConfigApp::$VIEW_NAV . ConfigApp::$VIEW_TPL_EXT;
		$this->view->show(ConfigApp::$VIEW_BASE_TEMPLATE, $params);
		
	}
	
	function getHome(){
		$params[ConfigApp::$VIEW_CONTENT] = ConfigApp::$VIEW_TEMPLATE_BASEPATH . ConfigApp::$ACTION_DEFAULT . ConfigApp::$VIEW_TPL_EXT;
		return $this->view->getHTML(ConfigApp::$VIEW_BASE_TEMPLATE, null, $params);
	}

	function getContent($content){
		return $this->view->getHTML($content);

	}

	function getSections(){
		return $this->model->getSections();
	}


}
