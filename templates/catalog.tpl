
<section>
  <div>
    <form id="uploadBook" class="uploadForm">
      <div class="form-group col-md-12">
        <div class="col-md-6">
            <label for="exampleInputBookName">Nombre Libro</label>
            <input type="text" class="form-control" name="bookName" id="exampleInputBookName" placeholder="Nombre">
        </div>
      </div>
      <div class="form-group col-md-12">
        <div class="col-md-6">
          <label for="exampleInputeDescription" >Descripcion</label>
          <textarea class="form-control" name="bookDescription" rows="3"></textarea>
        </div>
      </div>
      <div class="col-md-12">
      
        <div class="col-md-6">
          <label for="select">Elige categoria</label>
          {if $sections}
          <select class="form-control" name="bookSection">
           {foreach $sections as $section}
            <option id="{$section['id_seccion']}">{$section['nombre_seccion']}</option>
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
          <button data-action="add-book" type="submit" class="btn btn-default">Enviar</button>
        </div>

      </div>

    </form>
  </div>
</section>
