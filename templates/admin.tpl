<div class="tableDB table-responsive">
  {if $books}
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>
          Nombre Libro
        </th>
        <th>
          Autor
        </th>
        <th>
          Categoria
        </th>
        <th>
          Acciones
        </th>
      </tr>
    </thead>
    <tbody>
      {foreach $books as $book}
        <tr>
          <td>
            {$book['nombre_libro']}
          </td>
          <td>
            {$book['autor_libro']}
          </td>
          <td>
            {$book['seccion_id_seccion']}
          </td>
          <td>
            <a class="glyphicon glyphicon-pencil modify" ></a>
            <a class="glyphicon glyphicon-trash delete" ></a>
          </td>
        </tr>
      {/foreach}
    </tbody>
  </table>

  {/if}

</div>
