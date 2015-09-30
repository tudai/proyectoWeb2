<div class="col-md-12">
  <ul class="list-group col-md-4">
    {if $sections}
      {foreach $sections as $section}
        <li class="list-group-item" id="{$section['id_seccion']}">{$section['nombre_seccion']}</li>
      {/foreach}
    {else}
      <p>
        No hay secciones
      </p>
    {/if}
  </ul>
  <div class="col-md-8" id="booksList">

  </div>
</div>
