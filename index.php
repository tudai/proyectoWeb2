<?php

include_once 'config/config_app.php';
include_once 'controller/MainController.php';
require_once 'controller/CatalogController.php';



$mainController = new MainController();
$catalogController = new CatalogController();


if (isset($_REQUEST[ConfigApp::$ACTION])){
	$actionReq = $_REQUEST[ConfigApp::$ACTION];

	if ($actionReq == ConfigApp::$ACTION_CATALOG_ADD) {
		echo $mainController->addBook();
	}

	if ($actionReq == ConfigApp::$ACTION_SECTION){
		echo $mainController->addSection();

	}
	if ($actionReq == ConfigApp::$ACTION_CATALOG){
		echo $catalogController->getContent($actionReq);
	}
	
	if ($actionReq == ConfigApp::$ACTION_DEFAULT ||
		$actionReq == ConfigApp::$ACTION_FAQS ||
		$actionReq == ConfigApp::$ACTION_SECTION) {

			echo $mainController->getContent($actionReq);
	}
	
	if ($actionReq == ConfigApp::$ACTION_SECTION_ADD){
		echo $mainController->addSection();
	}

} else {
	$mainController->showHome();
}
