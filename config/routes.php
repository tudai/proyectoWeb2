<?php
return [
	'/' => [
			'controller' => 'main',
			'method' => 'getHome',
			'tpl' => 'home'
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
	'books-list' => [
			'controller' => 'catalog',
			'method' => 'getBookByID',
			'tpl' => 'public-books-list',
			'args' => ['id']
	],
	'loginIn' => [
			'controller' => 'thePolice',
			'method' => 'login',
			'tpl' => 'home'
	],
	'logout' => [
			'controller' => 'thePolice',
			'method' => 'logout',
			'tpl' => 'home'
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
	'editFormSection' =>[
			'controller' => 'admin',
			'method' => 'getContent',
			'tpl' => 'admin-list-section',
	]

];
