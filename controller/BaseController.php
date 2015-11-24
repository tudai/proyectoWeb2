<?php

require_once 'model/BaseModel.php';
require_once 'view/MainView.php';

abstract class BaseController{

	protected $model;
	protected $view;

	function __construct(){
		$this->model = new BaseModel();
		$this->view = new MainView();
	}

	function getBooksForTable($content){
		$books = $this->model->getBooks();
		$categories = $this->model->getSections();
		$arreglo = array();
		foreach ($books as $book ) {
			$listOfBooks = [
				'nombre_libro' =>$book['nombre_libro'],
				'autor_libro' =>$book['autor_libro'],
				'seccion_id_seccion' => ''
			];
			foreach($categories as $cat) {
				if ($book['seccion_id_seccion'] == $cat['id_seccion']){
					$listOfBooks['seccion_id_seccion'] = $cat['nombre_seccion'];
				}
			}

			array_push ($arreglo, $listOfBooks);
		}
		$arr = array('books' => $arreglo);//no estaria pasando nada con esto. Si hago lo anterior me lo da bien
		return $this->view->getHTML($content, null, $arr);

	}

	abstract function getContent($content);

}
