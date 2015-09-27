
<section>
  <div>
    <form action="index.php?action=add_book" method="POST" enctype="multipart/form-data">
      <div class="form-group col-md-12">
        <div class="col-md-6">
            <label for="exampleInputBookName">Nombre Libro</label>
            <input type="text" class="form-control" name="bookName" id="exampleInputBookName" placeholder="Nombre">
        </div>
      </div>
      <div class="form-group col-md-12">
        <div class="col-md-6">
          <label for="exampleInputeDescription" >Descripcion</label>
          <textarea class="form-control" name= "bookDescrip" rows="3"></textarea>
        </div>
      </div>
      <div class="col-md-12">
        <div class="col-md-6">
          <label for="select">Elige categoria</label>
          {if $sections}
          <select class="form-control" name="bookSection">
           {foreach $sections as $section}
            <option>{$section['nombre_seccion']}</option>
            {/foreach}
          </select>
          {/if}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group col-md-8">
          <label for="bookToUpload">Agregar archivo</label>
          <input type="file" name="bookToUpload">
        </div>
        <div class="col-md-8">
          <button type="submit" class="btn btn-default">Enviar</button>
        </div>

      </div>

    </form>
  </div>
</section>
