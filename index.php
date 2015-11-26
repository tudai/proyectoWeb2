<?php

require_once 'config/config_app.php';
require_once 'controller/MainController.php';
require_once 'controller/CatalogController.php';
require_once 'controller/AdminController.php';
require_once 'controller/ThePolice.php';


$mainController = new MainController();
$thePolice = new ThePolice();
$thePolice->verificarTiempo();//verifica el tiempo c


if (isset($_REQUEST[ConfigApp::$ACTION])){
	$actionReq = $_REQUEST[ConfigApp::$ACTION];

	switch ($actionReq) {
		case ConfigApp::$ACTION_BOOK_ADD:
			$adminController = new AdminController();
			echo $adminController->addBook();
			break;
		case ConfigApp::$ACTION_SECTION:
			$adminController = new AdminController();
			echo $adminController->getContent($actionReq);
			break;
		case ConfigApp::$ACTION_BOOK:
			$adminController = new AdminController();
			echo $adminController->getContent($actionReq);
			break;
		case ConfigApp::$ACTION_CATALOG:
			$adminController = new AdminController();
			echo $adminController->getContent($actionReq);
			break;
		case ConfigApp::$ACTION_GET_CATALOG_BY_ID:
			$catalogController = new catalogController();
			if (isset($_REQUEST['id'])){
				$id = $_REQUEST['id'];
				echo $catalogController->getBookByID($actionReq, $id);
			}
			break;
		case ConfigApp::$ACTION_ADMIN:
			$adminController = new AdminController();
			echo $adminController->getBooksForTable($actionReq);
			break;
		case ConfigApp::$ACTION_FAQS:
			$mainController = new MainController();
			echo $mainController->getContent($actionReq);
			break;
		case ConfigApp::$ACTION_LOGIN:
			$mainController = new MainController();
			echo $mainController->getContent($actionReq);
			break;
		case ConfigApp::$ACTION_SECTION:
			$mainController = new MainController();
			echo $mainController->getContent($actionReq);
			break;
		case ConfigApp::$ACTION_DEFAULT:
			$mainController = new MainController();
			echo $mainController->getBooksForTable($actionReq);
			break;
		case ConfigApp::$ACTION_SECTION_ADD:
			$adminController = new AdminController();
			echo $adminController->addSection();
			break;
		case ConfigApp::$ACTION_LOGIN_EXEC:
			$thePolice->login();
			echo $mainController->getHome();
			break;
		case ConfigApp::$ACTION_LOGOUT_EXEC:
			$thePolice->logout();
			echo $mainController->getHome();
			break;
	}
} else {
	echo $mainController->getHome();
}
