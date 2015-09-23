
<section>
  <div>
    <form action="index.php?action=add_book" method="POST" enctype="multipart/form-data">
      <div class="form-group col-md-12">
        <div class="col-md-6">
            <label for="exampleInputBookName">Nombre Libro</label>
            <input type="text" class="form-control" id="exampleInputBookName" placeholder="Nombre">
        </div>
      </div>
      <div class="form-group col-md-12">
        <div class="col-md-6">
          <label for="exampleInputeDescription">Descripcion</label>
          <textarea class="form-control" rows="3"></textarea>
        </div>
      </div>
      <div class="col-md-12">
        <div class="col-md-6">
          <label for="select">Elige categoria</label>
          <select class="form-control">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group col-md-8">
          <label for="bookToUpload">Agregar archivo</label>
          <input type="file" id="multipart/form-data">
        </div>
        <div class="col-md-8">
          <button type="submit" class="btn btn-default">Enviar</button>
        </div>

      </div>

    </form>
  </div>
</section>
