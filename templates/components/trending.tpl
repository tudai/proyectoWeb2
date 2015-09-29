<div>
  <div class="col-md-12">
    {if $libros}
      {foreach $libros as $libro}
      <div class="thumbnail col-md-2">
        <img class="img-responsive" id="{$libro['img_libro']}" src="{$libro['img_libro']}" alt="imagen-$libro['img_libro']">
        <div class="caption">
          <h3>{$libro['nombre_libro']}</h3>
          <p>{$libro['autor_libro']}</p>
          <!-- <p><a href="#" class="btn btn-primary" role="button">Button</a> </p> -->
        </div>
      </div>
      {/foreach}
    {/if}
  </div>
</div>
