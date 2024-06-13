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
                        <input type="text" class="form-control" id="name" name="name" required pattern="[A-Za-z\s]{4,15}" title="Solo texto y espacios. Min: 4, Max: 15">
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
                        <input type="text" class="form-control" id="price" name="price" required pattern="(?!^0+$)^[1-9][0-9]{3,4}$" title="Debe ser un número de 4 a 5 dígitos, no puede empezar con 0 y no puede ser solo ceros">
                        </div>
                        <label for="quantity_in" class="col-sm-1 control-label">Cantidad Entrada</label>
                        <div class="col-sm-5">
                        <input type="number" class="form-control" id="quantity_in" name="quantity_in" required min="50" max="3000" pattern="^[1-9][0-9]*$" title="Debe ser un número entre 50 y 3000, no puede empezar con 0 y no puede ser solo ceros">
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
                        <textarea id="editor1" name="description" rows="10" cols="80" required pattern="[A-Za-z\s]{20,70}" minlength="20" maxlength="70" title="Solo texto y espacios. Min: 20, Max: 70"></textarea>
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
