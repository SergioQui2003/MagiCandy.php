<!-- Borrar -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Eliminando...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="products_delete.php">
                <input type="hidden" class="prodid" name="id">
                <div class="text-center">
                    <p>BORRAR PRODUCTO</p>
                    <h2 class="bold name"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Eliminar</button>
              </form>
            </div>
        </div>
    </div>
</div>
<!-- Editar -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><b>Editar Producto</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="products_edit.php">
                    <input type="hidden" class="prodid" name="id" id="edit_id">
                    <div class="form-group">
                        <label for="edit_name" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="edit_name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_category" class="col-sm-2 control-label">Categoría</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="edit_category" name="category">
                                <!-- opciones de categoría -->
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_price" class="col-sm-2 control-label">Precio</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="edit_price" name="price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_quantity_in" class="col-sm-2 control-label">Cantidad Entrada</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="edit_quantity_in" name="quantity_in">

                        </div>
                    </div>
                    <p><b>Descripción</b></p>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea id="editor2" name="description" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" name="edit">Actualizar Producto</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function(){
    $(document).on('click', '.edit', function(){
        var id = $(this).data('id');
        // Hacer una solicitud AJAX para obtener los datos del producto
        $.ajax({
            type: 'GET',
            url: 'products_edit.php',
            data: {id: id},
            dataType: 'json',
            success: function(response){
                $('#edit_id').val(response.id);
                $('#edit_name').val(response.name);
                $('#edit_category').val(response.category_id);
                $('#edit_price').val(response.price);
                $('#edit_quantity').val(response.quantity_in); // Asegúrate de que quantity_in se asigne correctamente
                CKEDITOR.instances["editor2"].setData(response.description);
                $('#edit').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener los datos del producto:', error);
            }
        });
    });
});
</script>
