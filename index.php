<?php

require_once 'config/config_app.php';
require_once 'controller/MainController.php';
require_once 'controller/CatalogController.php';
require_once 'controller/AdminController.php';
require_once 'controller/ThePoliceController.php';
require_once 'controller/Router.php';

$mainController = new MainController();
$thePolice = new ThePoliceController();
$thePolice->verificarTiempo();//verifica el tiempo c

$router = new Router($_REQUEST);


if (isset($_REQUEST[ConfigApp::$ACTION])){
	$actionReq = $_REQUEST[ConfigApp::$ACTION];
	echo $router->runRequest($actionReq);
} else
	echo $router->runRequest();
 