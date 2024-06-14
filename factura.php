<?php
include 'includes/session.php';
include 'includes/header.php';

// Vaciar el carrito si se presiona el botón de volver al carrito
if (isset($_POST['vaciar_carrito'])) {
    unset($_SESSION['cart']);
    header('Location: cart_view.php'); // Redirigir al carrito después de vaciarlo
    exit();
}
?>

<style>
    .factura-container {
        margin: 0 auto;
        padding: 20px;
        background: white;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
    }
    .factura-header {
        text-align: center;
    }
    .factura-table {
        margin: 20px 0;
    }
    .download-pdf-btn {
        position: absolute;
        top: 20px;
        right: 20px;
    }
    .volver-carrito-btn {
        margin-top: 20px;
    }
</style>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>

        <div class="content-wrapper">
            <div class="container">
                <section class="content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="box box-solid factura-container">
                                <button id="download-pdf" class="btn btn-danger download-pdf-btn">Descargar PDF</button>
                                <div class="box-body">
                                    <div class="factura-header">
                                        <h1 class="page-header">Detalle de la Factura</h1>
                                        <h4>Fecha: <?php echo date('d/m/Y'); ?></h4>
                                        <?php
                                        $numero_factura = mt_rand(100000, 999999); // Genera un número de factura aleatorio
                                        echo "<h4>Número de Factura: $numero_factura</h4>";
                                        ?>
                                    </div>
                                    <table class="table table-bordered factura-table" id="factura-table">
                                        <thead>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Subtotal</th>
                                        </thead>
                                        <tbody id="tbody">
                                            <?php
                                            try {
                                                $total = 0;
                                                if(isset($_SESSION['user'])){
                                                    $stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user");
                                                    $stmt->execute(['user'=>$user['id']]);
                                                    foreach($stmt as $row){
                                                        $subtotal = $row['price'] * $row['quantity'];
                                                        $total += $subtotal;
                                                        echo "<tr>
                                                            <td>".$row['name']."</td>
                                                            <td>&#36; ".number_format($row['price'], 2)."</td>
                                                            <td>".$row['quantity']."</td>
                                                            <td>&#36; ".number_format($subtotal, 2)."</td>
                                                        </tr>";
                                                    }
                                                }
                                                else {
                                                    if(count($_SESSION['cart']) != 0){
                                                        foreach($_SESSION['cart'] as $row){
                                                            $stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
                                                            $stmt->execute(['id'=>$row['productid']]);
                                                            $product = $stmt->fetch();
                                                            $subtotal = $product['price'] * $row['quantity'];
                                                            $total += $subtotal;
                                                            echo "<tr>
                                                                <td>".$product['name']."</td>
                                                                <td>&#36; ".number_format($product['price'], 2)."</td>
                                                                <td>".$row['quantity']."</td>
                                                                <td>&#36; ".number_format($subtotal, 2)."</td>
                                                            </tr>";
                                                        }
                                                    }
                                                    else {
                                                        echo "<tr>
                                                            <td colspan='4' align='center'>Carrito de compras vacío</td>
                                                        </tr>";
                                                    }
                                                }
                                                echo "<tr>
                                                    <td colspan='3' align='right'><b>Total</b></td>
                                                    <td><b>&#36; ".number_format($total, 2)."</b></td>
                                                </tr>";
                                            } catch(PDOException $e) {
                                                echo "<tr><td colspan='4'>Error al cargar detalles del carrito.</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- <form action="" method="post">
                                <button type="submit" name="vaciar_carrito" class="btn btn-primary volver-carrito-btn">Volver al Carrito y Vaciar</button>
                            </form> -->
                        </div>
                    </div>
                </section>

                <?php
                if(isset($_SESSION['user'])){
                }
                else{
                    echo "<h4>Necesitas <a href='login.php'>Iniciar sesión</a> para revisar.</h4>";
                }
                ?>

            </div>
        </div>

        <?php $pdo->close(); ?>
        <!-- <?php include 'includes/footer.php'; ?> -->
    </div>

    <?php include 'includes/scripts.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.18/jspdf.plugin.autotable.min.js"></script>
    <script>
        document.getElementById('download-pdf').addEventListener('click', function () {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Información de la empresa
            const empresa = {
                nombre: "Quiromar",
                direccion: "Diagonal 64 # 56 -76 Tunja, Boyacá",
                telefono: "313 3813 154",
                email: "magicandy2023@gmail.com"
            };

            // Añadir logo
            const img = new Image();
            img.src = 'images/Logo.webp'; // Asegúrate de tener el logo en la ruta especificada
            img.onload = function() {
                doc.addImage(img, 'PNG', 10, 10, 50, 20); // Ajusta las dimensiones según sea necesario

                // Añadir información de la empresa con letra pequeña alineada a la derecha
                doc.setFontSize(10);
                doc.text(empresa.nombre, 150, 10);
                doc.text(empresa.direccion, 150, 15);
                doc.text(empresa.telefono, 150, 20);
                doc.text(empresa.email, 150, 25);

                // Añadir título, fecha y número de factura
                doc.setFontSize(16);
                doc.text("Detalle de la Factura", 105, 50, null, null, 'center');
                doc.setFontSize(12);
                doc.text("Fecha: <?php echo date('d/m/Y'); ?>", 105, 60, null, null, 'center');
                doc.text("Número de Factura: <?php echo $numero_factura; ?>", 105, 70, null, null, 'center');

                // Obtener datos de la tabla
                const body = [];
                const rows = document.querySelectorAll("#factura-table tbody tr");

                rows.forEach(row => {
                    const cells = row.querySelectorAll("td");
                    const rowData = [];
                    cells.forEach(cell => {
                        rowData.push(cell.innerText);
                    });
                    body.push(rowData);
                });

                // Añadir tabla
                doc.autoTable({
                    head: [['Nombre', 'Precio', 'Cantidad', 'Subtotal']],
                    body: body,
                    startY: 80,
                    styles: { halign: 'center' }
                });

                // Añadir mensaje de agradecimiento
                doc.text("Gracias por su compra!", 105, doc.lastAutoTable.finalY + 10, null, null, 'center');

                // Guardar el PDF
                doc.save("factura_<?php echo $numero_factura; ?>.pdf");
            };
        });
    </script>
</body>
</html>
