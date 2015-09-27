<?php

class BaseController{

	protected $model;
	protected $view;

	function __construct(){
		$this->model = new BaseModel();
		$this->view = new MainView();
	}

	function getContent($content){

	}

}
