<!DOCTYPE html>
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
            {foreach $tareas as $tarea}
            <li class="list-group-item">
                  {$tarea}
                  <a class="glyphicon glyphicon-trash" href="index.php?action=borrar_tarea&task={$tarea}"></a>
            {/foreach}
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          {if count($errores) gt 0}
          <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Errores</h3>
            </div>
            <ul>
              {foreach $errores as $error}
                <li>{$error}</li>
              {/foreach}
            </ul>
          </div>
          {/if}
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
