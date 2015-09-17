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
		$this->view->show();
	}
}