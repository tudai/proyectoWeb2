<div class="tableDB">
  {if $books}
  <table class="table">
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
    </tr>
    {foreach $books as $book}
      <tr>
        <th>
          {$book['nombre_libro']}
        </th>
        <th>
          {$book['autor_libro']}
        </th>
        <th>
          {$book['seccion_id_seccion']}
        </th>
      </tr>
    {/foreach}
  </table>

  {/if}

</div>
