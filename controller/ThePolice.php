<?php

//require_once 'BaseController.php';

require_once 'model/UserModel.php';

class ThePolice{

	private $activeUser;
	private $activeSession;

	private $model;

	public static $ACTIVE_USER = 'activeUser';

	function __construct(){
		$this->model = new UserModel();
		session_start();
	}

	function login(){
		if (isset($_REQUEST['username']) && isset($_REQUEST['password']) ){
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			$userTemp = $this->model->getUserCredentials($username, $password);

			if (count($userTemp)>0){

				$user['username'] = $userTemp[0]['username'];
				$user['role'] = $userTemp[0]['role'];
				$user['id'] = session_id();
				$_SESSION[ThePolice::$ACTIVE_USER] = $user;

				return true;
			} else
				return false;
		} else
			return false;
	}

	function logout(){
		session_unset();
		session_destroy();
	}
}
