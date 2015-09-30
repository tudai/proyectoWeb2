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

	if ($actionReq == ConfigApp::$ACTION_CATALOG_ADD) {
		$adminController = new AdminController();
		echo $adminController->addBook();
	}

	if ($actionReq == ConfigApp::$ACTION_SECTION){
		$adminController = new AdminController();
		echo $adminController->addSection();

	}
	if ($actionReq == ConfigApp::$ACTION_CATALOG){
		$adminController = new AdminController();
		echo $adminController->getContent($actionReq);
	}

	if ($actionReq == ConfigApp::$ACTION_FAQS ||
		$actionReq == ConfigApp::$ACTION_LOGIN ||
		$actionReq == ConfigApp::$ACTION_SECTION ||
		$actionReq == ConfigApp::$ACTION_CATEGORY) {
			echo $mainController->getContent($actionReq);
	}
	if ($actionReq == ConfigApp::$ACTION_DEFAULT){
		$adminController = new adminController();
		echo $adminController->getBooks($actionReq);
	}

	if ($actionReq == ConfigApp::$ACTION_SECTION_ADD){
		$adminController = new AdminController();
		echo $adminController->addSection();
	}

	if ($actionReq == ConfigApp::$ACTION_CATEGORY_ADD){
		$adminController = new AdminController();
		echo $adminController->addCategory();
	}

	if ($actionReq == ConfigApp::$ACTION_LOGIN_EXEC){
		 $thePolice->login();
		 echo $_SESSION[ThePolice::$ACTIVE_USER]['id'];
	}

} else {
	$mainController->showHome();
}
