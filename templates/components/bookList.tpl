
{if $books}
  <ul id="booksList">
    {foreach $books as $book}
    <li class="list-group-item">{$book['nombre_libro']}{$book['nombre_autor']} </li>
    {/foreach}
  </ul>
{/if}
