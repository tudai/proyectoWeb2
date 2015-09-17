<?php
include_once 'libs/Smarty.class.php';

class MainView{
	private $smarty;
    private $errors;
    private $template = 'templates/index.tpl';
    
	function __construct(){
		$this->smarty = new Smarty();
		$this->errors = array();
	}
	
	function show($obj = null){
		$this->smarty->assign('errors', $this->errors);
		if ($obj == null)
			$this->smarty->assign('obj', $obj);
		
		$this->smarty->display($this->template);
	}
	
	
	function showErrors($error){
		array_push($this->errors, $error);
	}
}