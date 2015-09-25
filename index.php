<?php

include_once 'config/config_app.php';
include_once 'controller/MainController.php';

$mainController = new MainController();

if (isset($_REQUEST[ConfigApp::$ACTION])){
	$actionReq = $_REQUEST[ConfigApp::$ACTION];

	if ($actionReq == ConfigApp::$ACTION_CATALOG_ADD) {
		echo $mainController->addBook();
	}

	if ($actionReq == ConfigApp::$ACTION_DEFAULT ||
		$actionReq == ConfigApp::$ACTION_CATALOG ||
		$actionReq == ConfigApp::$ACTION_FAQS) {

			echo $mainController->getContent($actionReq);
	}

} else {
	$mainController->showHome();
}
