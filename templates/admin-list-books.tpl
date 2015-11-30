<h2>Libros</h2>
<div>
  <ul id="listBooks" class="list-group">

  </ul>
  <!-- {if $books}
  <table class="table table-bordered table-striped">
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
    <tbody id="listBooks">
      <tr>
      {foreach $books as $book}

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

  {/if} -->

</div>
