<?php
require_once 'BooksApi.php';

$booksApi = new BooksApi($_REQUEST['parametros']);
echo $booksApi->processAPI();
?>
