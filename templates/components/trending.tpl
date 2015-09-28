<div class="row">
  <div class="col-sm-6 col-md-4">
    {if $libros}
      {foreach $libros as $libro}
      <div class="thumbnail">
        <img src="{$libro['img_libro']}" alt="imagen-$libro['img_libro']">
        <div class="caption">
          <h3>{$libro['nombre_libro']}</h3>
          <p>{$libro['autor_libro']}</p>
          <p><a href="#" class="btn btn-primary" role="button">Button</a> </p>
        </div>
      </div>
      {/foreach}
    {/if}
  </div>
</div>
