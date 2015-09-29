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
		$userTemp = "";
		if (isset($_REQUEST['username']) && isset($_REQUEST['password']) ){
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			$userTemp = $this->model->getUserCredentials($username, $password);
			
			if (count($userTemp)>0){
				$user['username'] = $userTemp[0]['username'];
				$user['role'] = $userTemp[0]['role'];
				$user['id'] = session_id();
			}
			$_SESSION['activeUser'] = $user;
			return true;
		} else
			return false;
		
		
 
	}
}