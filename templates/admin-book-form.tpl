<section>
<div id="formContainer" class="container">
	<div class="col-md-offset-1 col-md-9">
	    <form id="uploadBook" class="uploadForm">
	      <div class="form-group col-md-12">
	        <div class="col-md-12">
	            <label for="InputBookName">Nombre Libro</label>
	            <input type="text" class="form-control" name="bookName" id="InputBookName" placeholder="Nombre Libro">
	        </div>
	      </div>
	      <div class="form-group col-md-12">
	        <div class="col-md-12">
	          <label for="InputBookAuthor" >Nombre Autor</label>
	          <input type="text" class="form-control" name="bookAuthor" placeholder="Nombre Autor">
	          <!-- <textarea class="form-control" name="bookDescription" rows="3"></textarea> -->
	        </div>
	      </div>
	      <div class="col-md-12">
	        <div class="col-md-12">
	          <label for="select">Elige sección</label>
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
	        <div class="form-group col-md-12">
	          <label for="bookImageToUpload">Agregar imagen portada</label>
	          <input class="col-md-12" type="file" name="bookImageToUpload">
	        </div>
	        <div class="form-group col-md-12">
	          <label for="bookToUpload">Agregar libro</label>
	          <input class="col-md-12" type="file" name="bookToUpload">
	        </div>
	        <div class="form-group button-container col-md-12">
	          <button id="addBook" data-action="add-book" type="submit" class="btn btn-default">Subir</button>
	        </div>
	      </div>
	    </form>
	</div>
</div>
</section>
