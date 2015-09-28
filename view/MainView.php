<?php
include_once 'libs/Smarty.class.php';

class MainView{

	private $smarty;
    private $errors;
 	private $tpl_dir = 'templates/';
    private $template = 'templates/index.tpl';
    private $component = 'home';

	function __construct(){
		$this->smarty = new Smarty();
		$this->errors = array();

		$this->smarty->caching = false;
	}

	function show($component = null){
		$this->smarty->assign('errors', $this->errors);
		if ($component == null)
			$this->smarty->assign('component', $component);
		else
			$this->smarty->assign('component', $this->tpl_dir . $this->component. '.tpl');

		$this->smarty->display($this->template);
	}

	function getHTML($component, $middlePath = null, $paramsArray = null){
		if ($middlePath == null)
			$path = $this->tpl_dir . $component . '.tpl';
		else
			$path = $this->tpl_dir . $middlePath . $component . '.tpl';

		if ($paramsArray !=null)
			foreach ($paramsArray as $key => $value)
				$this->smarty->assign($key, $value);
		
		return $this->smarty->fetch($path);
	}

	function showErrors($error){
		array_push($this->errors, $error);
	}

}
