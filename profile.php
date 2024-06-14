<?php
include 'includes/session.php';

// Redirigir al inicio si el usuario no está autenticado
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

include 'includes/header.php';
?>

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
                                    <!-- Mostrar detalles del usuario -->
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
                                    <h4 class="box-title"><b>Productos comprados por última vez</b></h4>
                                </div>
                                <div class="box-body">
                                    <table class="table table-bordered" id="cartTable">
                                        <thead>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Subtotal</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $conn = $pdo->open();
                                            $totalCart = 0;

                                            try {
                                                // Mostrar productos del carrito del usuario
                                                $stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user_id");
                                                $stmt->execute(['user_id' => $user['id']]);
                                                
                                                foreach ($stmt as $row) {
                                                    $subtotal = $row['price'] * $row['quantity'];
                                                    $totalCart += $subtotal;
                                                    echo "
                                                        <tr>
                                                            <td>".$row['name']."</td>
                                                            <td>&#36; ".number_format($row['price'], 2)."</td>
                                                            <td>".$row['quantity']."</td>
                                                            <td>&#36; ".number_format($subtotal, 2)."</td>
                                                        </tr>
                                                    ";
                                                }
                                                if ($stmt->rowCount() == 0) {
                                                    echo "
                                                        <tr>
                                                            <td colspan='4' align='center'>No hay productos en el carrito</td>
                                                        </tr>
                                                    ";
                                                } else {
                                                    echo "
                                                        <tr>
                                                            <td colspan='3' align='right'><b>Total</b></td>
                                                            <td><b>&#36; ".number_format($totalCart, 2)."</b></td>
                                                        </tr>
                                                    ";
                                                }
                                            } catch (PDOException $e) {
                                                echo "Error: " . $e->getMessage();
                                            }

                                            // Mostrar fecha y número de factura
                                            $numero_factura = mt_rand(100000, 999999); // Número de factura aleatorio
                                            echo "<tr>
                                                <td colspan='3' align='right'><b>Fecha de Factura</b></td>
                                                <td>".date('d/m/Y')."</td>
                                            </tr>";
                                            echo "<tr>
                                                <td colspan='3' align='right'><b>Número de Factura</b></td>
                                                <td>$numero_factura</td>
                                            </tr>";

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
</body>
</html>
