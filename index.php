<?php

include_once 'config/config_app.php';
include_once 'controller/MainController.php';


if (isset($_REQUEST[ConfigApp::$ACTION]))
	$actionReq = $_REQUEST[ConfigApp::$ACTION];

$mainController = new MainController();


/*
 * Si no esta definida la variable 'action' en el
 * Request o esta definida y su valor es el default
 * */
if(!array_key_exists(ConfigApp::$ACTION, $_REQUEST) || $actionReq == ConfigApp::$ACTION_DEFAULT){
  $mainController->showHome();

} else {
		if ($actionReq == ConfigApp::$ACTION_CATALOG) {
			echo $mainController->getContent($actionReq);
		}
		else{
			if ($actionReq == ConfigApp::$ACTION_FAQS){
				echo $mainController->getContent($actionReq);
			}
		}
}
