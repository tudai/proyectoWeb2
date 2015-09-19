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
}
