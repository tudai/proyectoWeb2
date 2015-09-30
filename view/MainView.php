<?php
include_once 'libs/Smarty.class.php';

class MainView{

	private $smarty;
 	private $tpl_dir = 'templates/';
    private $template = 'templates/index.tpl';
    private $component = 'home';
    private $nav = 'templates/nav.tpl';

    public static $VIEW_CONTENT = 'content';
    
	function __construct(){
		$this->smarty = new Smarty();
		$this->errors = array();

		$this->smarty->caching = false;
	}
/*
	function show($component = null){
		if ($component == null)
			$this->smarty->assign('component', $component);
		else
			$this->smarty->assign('component', $this->tpl_dir . $this->component. '.tpl');

		$this->smarty->display($this->template);
	}
*/
	
	function show($arrayParam = null){
		$arrayParam['nav'] = $this->nav;
		if (isset($arrayParam[MainView::$VIEW_CONTENT]))
			$arrayParam[MainView::$VIEW_CONTENT] = $this->tpl_dir . $this->component . '.tpl';
		else{
			$content = $arrayParam[MainView::$VIEW_CONTENT];
			$arrayParam[MainView::$VIEW_CONTENT] = $this->tpl_dir . $content . '.tpl';
		}
		$this->assignObjectsToTemplate($arrayParam);
		$this->smarty->display($this->template);
	}
	
	function getHTML($component, $middlePath = null, $paramsArray = null){
		if ($middlePath == null)
			$path = $this->tpl_dir . $component . '.tpl';
		else
			$path = $this->tpl_dir . $middlePath . $component . '.tpl';

		$paramsArray['nav'] = $this->nav;
		$this->assignObjectsToTemplate($paramsArray);		
		return $this->smarty->fetch($path);
	}

	private function assignObjectsToTemplate($paramsArray = null){
		if ($paramsArray !=null)
			foreach ($paramsArray as $key => $value)
				$this->smarty->assign($key, $value);
	}
}
