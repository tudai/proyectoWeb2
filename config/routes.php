<?php
return [
	'/' => [
			'controller' => 'main',
			'method' => 'getHome'
	],
	'home' => [
			'controller' => 'main',
			'method' => 'getBooksForTable',
			'tpl' => 'home',
	],
	'faq' => [
			'controller' => 'main',
			'method' => 'getContent',
			'tpl' => 'faq'
	],
	'login' => [
			'controller' => 'main',
			'method' => 'getContent',
			'tpl' => 'login',
	],		
	'catalog' => [
			'controller' => 'admin',
			'method' => 'getContent',
			'tpl' => 'catalog',
	],
	'admin-list-books' => [
			'controller' => 'admin',
			'method' => 'getBooksForTable',
			'tpl' => 'admin-list-books', 
	],
	'admin-book-form' => [
			'controller' => 'admin',
			'method' => 'getContent',
			'tpl' => 'admin-book-form',
	],	
	'books-list' => [
			'controller' => 'catalog',
			'method' => 'getBookByID',
			'tpl' => 'public-books-list',
			'args' => ['id']			
	]	
];