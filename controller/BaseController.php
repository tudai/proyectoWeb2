<?php

require_once 'model/BaseModel.php';
require_once 'view/MainView.php';

abstract class BaseController{

	protected $model;
	protected $view;

	function __construct(){
		$this->model = new BaseModel();
		$this->view = new MainView();
	}

	abstract function getContent($content);

}
