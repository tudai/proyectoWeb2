<?php
include_once 'libs/Smarty.class.php';

class MainView{
	
	private $smarty;
    private $errors;
 
    private $template = 'templates/index.tpl';
    private $component = 'templates/home.tpl';
    
	function __construct(){
		$this->smarty = new Smarty();
		$this->errors = array();
	}
	
	function show($component = null){
		$this->smarty->assign('errors', $this->errors);
		if ($component == null)
			$this->smarty->assign('component', $component);
		else 
			$this->smarty->assign('component', $this->component);
		
		$this->smarty->display($this->template);
	}
	
	
	
	function showErrors($error){
		array_push($this->errors, $error);
	}
}