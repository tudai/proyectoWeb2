{if $books}
  <ul>
    {foreach $books as $book}
    <li class="list-group-item">{$book['nombre_libro']} -- {$book['autor_libro']} </li>
    {/foreach}
  </ul>
{else}
  <ul>
      <li class="list-group-item list-group-item-danger"> No se encontraron libros en esa seccion</li>
  </ul>
{/if}
