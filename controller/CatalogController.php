<?php
require_once 'BaseController.php';

class CatalogController extends BaseController{

	function __construct(){
		parent::__construct();
	}

	function getContent($content){}

	function getBookByID($args){
		$books = $this->modelBook->getBookBySectionID($args['args']['id']);
		$arr = array('books' => $books);
		return $this->view->getHTML($args['tpl'], null, $arr);
	}

}
