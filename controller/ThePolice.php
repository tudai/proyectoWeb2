<?php

//require_once 'BaseController.php';

require_once 'model/BaseModel.php';

class ThePolice{
	
	private $activeUser;
	private $activeSession;
	
	private $model;
	
	private static $ACTIVE_USER = 'active-user';
	
	function __construct(){
		$this->model = new BaseModel();
		session_start();
	}
	
	function login(){
		$user = "user";
		if (isset($_REQUEST['username']) && isset($_REQUEST['password']) ){
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			$user = $this->model->getUserCredentials($username, $password);
		}
		return json_encode($user);
	}
}