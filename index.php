<?php

require_once 'config/config_app.php';
require_once 'controller/MainController.php';
require_once 'controller/CatalogController.php';
require_once 'controller/AdminController.php';
require_once 'controller/ThePolice.php';


$mainController = new MainController();
$thePolice = new ThePolice();

if (isset($_REQUEST[ConfigApp::$ACTION])){
	$actionReq = $_REQUEST[ConfigApp::$ACTION];

	if ($actionReq == ConfigApp::$ACTION_BOOK_ADD) {
		$adminController = new AdminController();
		echo $adminController->addBook();
	}

	if ($actionReq == ConfigApp::$ACTION_SECTION){
		$adminController = new AdminController();
		echo $adminController->addSection();

	}
	if ($actionReq == ConfigApp::$ACTION_BOOK ||
		$actionReq == ConfigApp::$ACTION_CATALOG){
		$adminController = new AdminController();
		echo $adminController->getContent($actionReq);
	}
	if($actionReq == ConfigApp::$ACTION_GET_CATALOG_BY_ID){
		$catalogController = new catalogController();
		if (isset($_REQUEST['id'])){
			$id = $_REQUEST['id'];
			echo $catalogController->getBookByID($actionReq, $id);
		}
	}
	if ($actionReq == ConfigApp::$ACTION_ADMIN ){
		$adminController = new AdminController();
		echo $adminController->getBooksForTable($actionReq);
	}

	if ($actionReq == ConfigApp::$ACTION_FAQS ||
		$actionReq == ConfigApp::$ACTION_LOGIN ||
		$actionReq == ConfigApp::$ACTION_SECTION) {
			echo $mainController->getContent($actionReq);
	}
	if ($actionReq == ConfigApp::$ACTION_DEFAULT){
		echo $mainController->getBooksList($actionReq);
	}

	if ($actionReq == ConfigApp::$ACTION_SECTION_ADD){
		$adminController = new AdminController();
		echo $adminController->addSection();
	}


	if ($actionReq == ConfigApp::$ACTION_LOGIN_EXEC){
		 $thePolice->login();
		 echo $_SESSION[ThePolice::$ACTIVE_USER]['id'];
	}

	if ($actionReq == ConfigApp::$ACTION_LOGIN_EXEC){
		$thePolice->login();
		echo $mainController->getHome();
	}

	if ($actionReq == ConfigApp::$ACTION_LOGOUT_EXEC){
		$thePolice->logout();
		echo $mainController->getHome();
	}

} else {
	echo $mainController->getHome();
}
