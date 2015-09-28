<?php
require_once 'BaseController.php';

class CatalogController extends BaseController{

	function __construct(){
		parent::__construct();
	}

	function getContent($content){
		$sections = $this->model->getSections();
		$arr = array('sections' => $sections);
		return $this->view->getHTML($content, null, $arr);
	}

}
