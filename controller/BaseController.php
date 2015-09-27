<?php 

class BaseController{
	
	private $model;
	private $view;
	
	function __construct(){
		$this->model = new BaseModel();
		$this->view = new MainView();
	}
	
	function getContent(){
		
	}
	
}