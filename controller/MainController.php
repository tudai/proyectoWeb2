<?php

require_once 'BaseController.php';
require_once 'view/MainView.php';

class MainController extends BaseController{


	function __construct(){
		parent::__construct();
	}

	function showHome(){
		$data[MainView::$VIEW_CONTENT] = ConfigApp::$ACTION_DEFAULT;
		$this->view->show($data);

	}

	function getContent($content){
		return $this->view->getHTML($content);

	}

	function getSections(){
		return $this->model->getSections();
	}


}
