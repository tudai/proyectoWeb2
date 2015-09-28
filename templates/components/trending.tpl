<div class="row">
  <div class="col-sm-6 col-md-4">
    {if $libros}
      {foreach $libros as $libro}
      <div class="thumbnail">
        <img src="..." alt="...">
        <div class="caption">
          <h3>{$libro['nombre_libro']}</h3>
          <p>{$libro['autor_libro']}</p>
          <p><a href="#" class="btn btn-primary" role="button">Button</a> </p>
        </div>
      </div>
    {/if}
  </div>
</div>
