<?php

require_once 'BaseController.php';

class MainController extends BaseController{


	function __construct(){
		parent::__construct();
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


}
