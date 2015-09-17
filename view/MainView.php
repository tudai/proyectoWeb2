<?php
include_once 'libs/Smarty.class.php';

class MainView{
	private $smarty;
    private $errors;
    
	function __construct(){
		$this->smarty = new Smarty();
		$this->errors = array();
	}
	
	function show($template, $obj){
		$this->smarty->assign('errors', $this->errors);
		$this->smarty->assign('obj', $obj);
		$this->smarty->display($template);
	}
	
	
	function showErrors($error){
		array_push($this->errors, $error);
	}
}