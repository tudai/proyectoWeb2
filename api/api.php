<?php
require_once 'AdminApi.php';
require_once '../config/config_app.php';

$adminApi = new AdminApi($_REQUEST['parametros']);

echo $adminApi->processAPI();
?>
