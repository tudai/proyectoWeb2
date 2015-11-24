<?php
require_once 'BaseController.php';

class CatalogController extends BaseController{

	function __construct(){
		parent::__construct();
	}

	function getContent($content){

	}

	function getBookByID($content, $id){
		$books = $this->modelBook->getBookBySectionID($id);
		$arr = array('books' => $books);
		return $this->view->getHTML($content, null, $arr);
	}

}
