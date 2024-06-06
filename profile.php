<?php include 'includes/session.php'; ?>
<?php if(!isset($_SESSION['user'])): ?>
    <?php header('location: index.php'); ?>
<?php endif; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        
        <div class="content-wrapper">
            <div class="container">
                <!-- Contenido principal -->
                <section class="content">
                    <div class="row">
                        <div class="col-sm-9">
                            <?php if(isset($_SESSION['error'])): ?>
                                <div class='callout callout-danger'>
                                    <?php echo $_SESSION['error']; ?>
                                </div>
                                <?php unset($_SESSION['error']); ?>
                            <?php endif; ?>

                            <?php if(isset($_SESSION['success'])): ?>
                                <div class='callout callout-success'>
                                    <?php echo $_SESSION['success']; ?>
                                </div>
                                <?php unset($_SESSION['success']); ?>
                            <?php endif; ?>

                            <div class="box box-solid">
                                <div class="box-body">
                                    <div class="col-sm-3">
                                        <img src="<?php echo (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg'; ?>" width="100%">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h4>Nombre:</h4>
                                                <h4>Correo:</h4>
                                                <h4>Contacto:</h4>
                                                <h4>Dirección:</h4>
                                                <h4>Miembro desde:</h4>
                                            </div>
                                            <div class="col-sm-9">
                                                <h4><?php echo $user['firstname'].' '.$user['lastname']; ?>
                                                    <span class="pull-right">
                                                        <a href="#edit" class="btn btn-success btn-flat btn-sm" data-toggle="modal" style="background-color: #149e45; border-color: #149e45;">
                                                            <i class="fa fa-edit"></i> Editar
                                                        </a>
                                                    </span>
                                                </h4>
                                                <h4><?php echo $user['email']; ?></h4>
                                                <h4><?php echo (!empty($user['contact_info'])) ? $user['contact_info'] : 'N/a'; ?></h4>
                                                <h4><?php echo (!empty($user['address'])) ? $user['address'] : 'N/a'; ?></h4>
                                                <h4><?php echo date('M d, Y', strtotime($user['created_on'])); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h4 class="box-title"><i class="fa fa-calendar"></i> <b>Historial de transacciones</b></h4>
                                </div>
                                <div class="box-body">
                                    <table class="table table-bordered" id="example1">
                                        <thead>
                                            <th class="hidden"></th>
                                            <th>Fecha</th>
                                            <th>Transacción#</th>
                                            <th>Cantidad</th>
                                            <th>Detalles completos</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $conn = $pdo->open();

                                                try{
                                                    $stmt = $conn->prepare("SELECT * FROM sales WHERE user_id=:user_id ORDER BY sales_date DESC");
                                                    $stmt->execute(['user_id'=>$user['id']]);
                                                    foreach($stmt as $row){
                                                        $stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
                                                        $stmt2->execute(['id'=>$row['id']]);
                                                        $total = 0;
                                                        foreach($stmt2 as $row2){
                                                            $subtotal = $row2['price']*$row2['quantity'];
                                                            $total += $subtotal;
                                                        }
                                                        echo "
                                                            <tr>
                                                                <td class='hidden'></td>
                                                                <td>".date('M d, Y', strtotime($row['sales_date']))."</td>
                                                                <td>".$row['pay_id']."</td>
                                                                <td>&#36; ".number_format($total, 2)."</td>
                                                                <td><button class='btn btn-sm btn-flat btn-info transact' data-id='".$row['id']."'><i class='fa fa-search'></i> Ver</button></td>
                                                            </tr>
                                                        ";
                                                    }
                                                }
                                                catch(PDOException $e){
                                                    echo "Hay algún problema en la conexión.: " . $e->getMessage();
                                                }

                                                $pdo->close();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <?php include 'includes/sidebar.php'; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php include 'includes/profile_modal.php'; ?>
    </div>

    <?php include 'includes/scripts.php'; ?>
    <script>
    $(function(){
        $(document).on('click', '.transact', function(e){
            e.preventDefault();
            $('#transaction').modal('show');
            var id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: 'transaction.php',
                data: {id:id},
                dataType: 'json',
                success:function(response){
                    $('#date').html(response.date);
                    $('#transid').html(response.transaction);
                    $('#detail').prepend(response.list);
                    $('#total').html(response.total);
                }
            });
        });

        $("#transaction").on("hidden.bs.modal", function () {
            $('.prepend_items').remove();
        });
    });
    </script>
</body>
</html>
