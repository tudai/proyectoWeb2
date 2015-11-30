<?php

//require_once 'BaseController.php';

require_once 'model/UserModel.php';
require_once 'view/MainView.php';
require_once 'BaseController.php';

class ThePoliceController extends BaseController{

	private $activeUser;
	private $activeSession;

	private $userModel;

	public static $ACTIVE_USER = 'activeUser';

	function __construct(){
		parent::__construct();
		$this->userModel = new UserModel();

		if (!$this->is_session_started())
			session_start();
	}

	function incializar(){
		$_SESSION['intervalo']  = 10; // en minutos
		$_SESSION['inicio'] = time(); //tiempo de inicio

	}

	function login(){

		if (isset($_REQUEST['username']) && isset($_REQUEST['password']) ){
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			$userTemp = $this->userModel->getUserCredentials($username, $password);

			if (count($userTemp)>0){

				$user['username'] = $userTemp[0]['username'];
				$user['role'] = $userTemp[0]['role'];
				$user['id'] = session_id();
				$_SESSION[ThePoliceController::$ACTIVE_USER] = $user;
				$this->incializar();

			} 
		} 
		$params[ConfigApp::$VIEW_CONTENT] = ConfigApp::$VIEW_TEMPLATE_BASEPATH . ConfigApp::$ACTION_DEFAULT . ConfigApp::$VIEW_TPL_EXT;
		$params['books'] = $this->buildBooksForTable();
		return $this->view->getHTML(ConfigApp::$VIEW_BASE_TEMPLATE, null, $params);
	}

	function verificarTiempo(){
		if (isset($_SESSION['inicio']) && isset($_SESSION['intervalo'])){
			$segundos = time();
			$tiempo_transcurrido = $segundos;
			$_SESSION['inicio'];
			$tiempo_maximo = $_SESSION['inicio']  + ($_SESSION['intervalo'] * 60); // se multiplica por 60 segundos ya que se configura en minutos
			if($tiempo_transcurrido > $tiempo_maximo){
				$this->logout();
			}
		}
	}

	function logout(){
		session_unset();
		session_destroy();
		header('Location: index.php');
	}
	
	private function is_session_started(){
		if ( php_sapi_name() !== 'cli' ) {
			if ( version_compare(phpversion(), '5.4.0', '>=') ) {
				return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
			} else {
				return session_id() === '' ? FALSE : TRUE;
			}
		}
		return FALSE;
	}
	
	function getContent($content){}
}
