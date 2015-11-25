<div class="col-md-12">
  <ul class="list-group col-md-4">
    {if $sections}
      {foreach $sections as $section}
        <a href="#" class="list-group-item sec" id="{$section['id_seccion']}">{$section['nombre_seccion']}</a>
      {/foreach}
    {else}
      <p>
        No hay secciones
      </p>
    {/if}
  </ul>
  <div class="col-md-8" id="bookList">

  </div>
</div>
