<ul class="list-group col-md-6">
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
