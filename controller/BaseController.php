<?php

require_once 'model/BookModel.php';
require_once 'model/SectionModel.php';
require_once 'view/MainView.php';

abstract class BaseController{

	protected $modelSection;
	protected $modelBook;
	protected $view;

	function __construct(){
		$this->modelSection = new SectionModel();
		$this->modelBook = new BookModel();
		$this->view = new MainView();
	}

	function buildBooksForTable(){
		$books = $this->modelBook->getBooks();
		$categories = $this->modelSection->getSections();
		$arreglo = array();
		foreach ($books as $book ) {
			$listOfBooks = [
				'nombre_libro' =>$book['nombre_libro'],
				'autor_libro' =>$book['autor_libro'],
				'img_libro' => $book['img_libro'],	
				'seccion_id_seccion' => ''
			];
			foreach($categories as $cat) {
				if ($book['seccion_id_seccion'] == $cat['id_seccion']){
					$listOfBooks['seccion_id_seccion'] = $cat['nombre_seccion'];
				}
			}
			array_push ($arreglo, $listOfBooks);
		}

	 return $arreglo;
	}

	function getBooksForTable($args){
		$arreglo = $this->buildBooksForTable();
		$arr = array('books' => $arreglo);
		return $this->view->getHTML($args['tpl'], null, $arr);
	}
	

	abstract function getContent($args);

}
