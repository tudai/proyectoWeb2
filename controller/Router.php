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
		
		$routeElement = $pattern['route']; 
		
		$this->controller = ucfirst($routes[$routeElement]['controller']).'Controller'; // ->LalaController
		$this->method = $routes[$routeElement]['method']; // -> getBook
		
		$this->args['tpl'] = $pattern['tpl'];
		
		if (array_key_exists('args', $pattern))
			$this->args['args'] = $pattern['args'];
	
	
	}

	function processRequest($request, $routes){
		$params = explode("/", rtrim($request['action'], '/')); // book/9 => [book, 9]
		
		if ($params[0] != "")
			$route = array_shift($params); // book << $params => [9]
		else
			$route = '/';
		
		
		
		$result = array();
		$result['route'] = $route;
		$result['tpl'] =  $routes[$route]['tpl'];
		$t=0;
		
		if (array_key_exists('args', $routes[$route])){
			$args = $routes[$route]['args'];
			foreach($args as $value){
				$result['args'][$value] = $params[$t];
				$t++;
			}
		}
		return $result;
	}
	
	function runRequest(){
		
		if (method_exists($this->controller, $this->method)) {
		 	$obj = new $this->controller();
		 	echo $obj->{$this->method}($this->args);
		 } 
	}
	

	
	
}