<?php
include_once 'libs/Smarty.class.php';

class MainView{

	private $smarty;
 	private $tpl_dir = 'templates/';
    private $template = 'templates/index.tpl';
    private $component = 'home';
    private $nav = 'templates/components/nav.tpl';

    public static $VIEW_CONTENT = 'content';
    
	function __construct(){
		$this->smarty = new Smarty();
		$this->errors = array();

		$this->smarty->caching = false;
	}
	
	function show($template, $arrayParam = null){
		$this->assignObjectsToTemplate($arrayParam);
		$this->smarty->display(ConfigApp::$VIEW_TEMPLATE_BASEPATH . $template .ConfigApp::$VIEW_TPL_EXT);
	}
	
	function getHTML($component, $middlePath = null, $paramsArray = null){
		if ($middlePath == null)
			$path = ConfigApp::$VIEW_TEMPLATE_BASEPATH . $component . ConfigApp::$VIEW_TPL_EXT;
		else
			$path = ConfigApp::$VIEW_TEMPLATE_BASEPATH . $middlePath . $component . ConfigApp::$VIEW_TPL_EXT;

		$this->assignObjectsToTemplate($paramsArray);	
		return $this->smarty->fetch($path);
	}

	private function assignObjectsToTemplate($paramsArray = null){
		if ($paramsArray !=null)
			foreach ($paramsArray as $key => $value)
				$this->smarty->assign($key, $value);
	}
}
