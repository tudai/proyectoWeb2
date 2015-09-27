<?php 

class CatalogController extends BaseController{
	
	function __construct(){		
		parent::__constructr();
	}
	
	function getContent(){
		$sections = $this->model->getAllSections();
		
	}
	
}