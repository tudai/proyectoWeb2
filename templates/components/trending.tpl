<div>
  <div class="col-md-12">
    {if $books}
      {foreach $books as $book}
      <div class="thumbnail col-md-2 thmb-home">
        <img class="img-responsive img-home" id="{$book['img_libro']}" src="{$book['img_libro']}" alt="imagen-$book['img_libro']">
        <div class="caption">
          <h3>{$book['nombre_libro']}</h3>
          <p>{$book['autor_libro']}</p>
          <!-- <p><a href="#" class="btn btn-primary" role="button">Button</a> </p> -->
        </div>
      </div>
      {/foreach}
    {/if}
  </div>
</div>
