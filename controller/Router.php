<?php



function loadControllers($class_name){
	if (file_exists('controller/'.$class_name.'.php'))
		require_once 'controller/'.$class_name.'.php';
}
spl_autoload_register('loadControllers');



class Router{
		
	private $controller;
	private $method;
	private $args = null;
	
	function __construct($request){
		$routes = require_once "config/routes.php";
	
		$pattern = $this->processRequest($request, $routes);
		
		$routeElement = $pattern[0]['route']; 
		
		$this->controller = ucfirst($routes[$routeElement]['controller']).'Controller'; // ->LalaController
		$this->method = $routes[$routeElement]['method']; // -> getBook
		$this->args = $pattern[2]; // {"id": "9"}
	}

	function processRequest($request, $routes){
		$params = explode("/", rtrim($request['action'], '/')); // book/9 => [book, 9]
		$route = array_shift($params); // book << $params => [9] 
		$args = $routes[$route]['args']; 
		
		$result = array();
		$result[0]['route'] = $route;
		$result[1]['tpl'] =  $routes[$route]['tpl'];
		$t=0;
		foreach($args as $value){
			$result[2][$value] = $params[$t];
			$t++; 
		}
		echo json_encode($result);
		return $result;
	}
	
	function runRequest(){
		
		if (method_exists($this->controller, $this->method)) {
		 	$obj = new $this->controller();
		 	$params = array();
		 	
					 		
		    echo $obj->{$this->method}($this->$args);
		 } 
	}
	

	
	
}