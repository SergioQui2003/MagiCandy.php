<!-- Description -->
<div class="modal fade" id="description">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="name"></span></b></h4>
            </div>
            <div class="modal-body">
                <p id="desc"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Añadir -->

<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><b>Agregar nuevo producto</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="products_add.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="col-sm-1 control-label">Nombre</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <label for="category" class="col-sm-1 control-label">Categoría</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="category" name="category" required>
                                <option value="" selected>- Seleccione -</option>
                                <!-- Aquí se deberían cargar las opciones de categorías desde la base de datos -->
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-1 control-label">Precio</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="price" name="price" required>
                        </div>
                        <label for="quantity_in" class="col-sm-1 control-label">Cantidad Entrada</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="quantity_in" name="quantity_in" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo" class="col-sm-1 control-label">Foto</label>
                        <div class="col-sm-5">
                            <input type="file" id="photo" name="photo">
                        </div>
                    </div>
                    <p><b>Descripción</b></p>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea id="editor1" name="description" rows="10" cols="80" required></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
