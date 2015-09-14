<?php /* Smarty version Smarty-3.1.14, created on 2015-08-28 04:46:38
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73997564755dfa73cc788d1-72237692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1440729995,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73997564755dfa73cc788d1-72237692',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_55dfa73cc9dfd7_94288927',
  'variables' => 
  array (
    'tareas' => 0,
    'tarea' => 0,
    'errores' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55dfa73cc9dfd7_94288927')) {function content_55dfa73cc9dfd7_94288927($_smarty_tpl) {?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">

      <div class="page-header">
        <h1>Lista de Tareas</h1>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label class="control-label" for="nombre">Tarea</label>
          <ul class="list-group">
            <?php  $_smarty_tpl->tpl_vars['tarea'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tarea']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tareas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tarea']->key => $_smarty_tpl->tpl_vars['tarea']->value){
$_smarty_tpl->tpl_vars['tarea']->_loop = true;
?>
            <li class="list-group-item">
                  <?php echo $_smarty_tpl->tpl_vars['tarea']->value;?>

                  <a class="glyphicon glyphicon-trash" href="index.php?action=borrar_tarea&task=<?php echo $_smarty_tpl->tpl_vars['tarea']->value;?>
"></a>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <?php if (count($_smarty_tpl->tpl_vars['errores']->value)>0){?>
          <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Errores</h3>
            </div>
            <ul>
              <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['errores']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
              <?php } ?>
            </ul>
          </div>
          <?php }?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <form action="index.php?action=agregar_tarea" method="POST">
            <div class="form-group">
              <label for="task">Tarea</label>
              <input type="text" class="form-control" id="task" name="task1" placeholder="Tarea">
            </div>
            <button type="submit" class="btn btn-default">Agregar</button>
          </form>
        </div>
      </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
<?php }} ?>