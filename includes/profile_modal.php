<div class="modal fade" id="transaction">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><b>Detalles completos de la transacción</b></h4>
            </div>
            <div class="modal-body">
                <p>
                    Fecha: <span id="date"></span>
                    <span class="pull-right">Transaction#: <span id="transid"></span></span> 
                </p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="detail">
                        <tr>
                            <td colspan="3" align="right"><b>Total</b></td>
                            <td><span id="total"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">
                    <i class="fa fa-close"></i> Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Editar perfil -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center"><b>Actualización de datos</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="profile_edit.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label">Primer nombre:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>" pattern="[A-Za-z\s]{3,20}" title="El nombre debe tener entre 4 y 20 caracteres y solo puede contener letras y espacios" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-3 control-label">Apellido:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>" pattern="[A-Za-z\s]{4,25}" title="El apellido debe tener entre 4 y 25 caracteres y solo puede contener letras y espacios" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Nueva contraseña:</label>
                        <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" name="password" minlength="6" maxlength="12" value="<?php echo $user['password']; ?>">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact" class="col-sm-3 control-label">Datos de contacto:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="contact" name="contact" pattern="^(?!.*(.)\1{2})[1-9][0-9]{9}$" title="Debe contener mínimo 10 números, máximo 10 y no pueden ser consecutivos ni solo ceros" value="<?php echo $user['contact_info']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Dirección:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address" name="address" pattern=".{7,20}" title="Por favor ingresa entre 7 y 20 caracteres" required value="<?php echo $user['address']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Foto:</label>
                        <div class="col-sm-9">
                            <input type="file" id="photo" name="photo">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="curr_password" class="col-sm-3 control-label">Contraseña actual:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="Ingrese su contraseña actual para hacer los cambios" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal" style="background-color: #e30613; color: #ffffff;"><i class="fa fa-close" style="color: #ffffff;"></i> Cerrar</button>
                <button type="submit" class="btn btn-success btn-flat" style="background-color: #149e45;" name="edit">
                    <i class="fa fa-check-square-o"></i> Actualizar
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
