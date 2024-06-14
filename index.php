<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MagiCandy</title>
    <link rel="stylesheet" href="../dist/css/Index.css">
    <!-- Agrega cualquier otro enlace a hojas de estilos aquí -->
    <?php include 'includes/session.php'; ?>
    <?php include 'includes/header.php'; ?>
</head>
<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Contenido principal -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                                if(isset($_SESSION['error'])){
                                    echo "
                                        <div class='alert alert-danger'>
                                            ".$_SESSION['error']."
                                        </div>
                                    ";
                                    unset($_SESSION['error']);
                                }
                            ?>
                            <!-- BANNER DE LA WEB -->
                            <div class="banner">
                                <img src="../images/Banner.webp" alt="Banner de la página web">
                            </div>
                            <div class="containerOne">
                                <p class="persuasive-text"><strong>¡Has llegado a un mundo de experiencias inolvidables!</strong></p>
                            </div>
                            <!-- AQUÍ VAN LAS TRES (3) PRIMERAS IMÁGENES DE LOS PRODUCTOS -->
                            <div class="container-products">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <img src="../images/max.webp" alt="max">
                                    </div>
                                    <div class="col-xs-4">
                                        <img src="../images/barrilete.webp" alt="barrilete">
                                    </div>
                                    <div class="col-xs-4">
                                        <img src="../images/bombun.webp" alt="bombun">
                                    </div>
                                </div>
                            </div>
                            <div class="containerOne">
                                <p class="persuasive-text"><strong>Hacemos felices los mejores momentos del día con tan solo un dulce en tu boca.</strong></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
</body>
</html>
