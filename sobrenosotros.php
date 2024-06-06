<link rel="stylesheet" href="../dist/css/nosotros.css">
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav" style="background-color: white;">
<div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Contenido principal -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12">
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
                        <div class="first-paragraph"> 
                            <p class="us-paragraph">Somos una dulcería apasionada por endulzar
                                la vida de las personas a través de nuestros deliciosos productos.
                                Desde nuestros inicios, nos hemos dedicado a fabricar refrescos y 
                                revender una amplia variedad de dulces, convirtiéndonos en un destino 
                                irresistible para los amantes de los sabores dulces y refrescantes.<br><br>
                                Nuestra historia está marcada por la pasión por la excelencia y la 
                                búsqueda constante de la satisfacción de nuestros clientes.
                                Trabajamos arduamente para ofrecer productos de la más alta calidad, 
                                seleccionando cuidadosamente los ingredientes y siguiendo rigurosos 
                                estándares de producción.
                            </p>
                            <div class="us-img">
                                <img src="../images/nosotros.webp" width="450px" height="300px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mission"><h3><span>Misión</span></h3></div>
                                <p id="mission-paragraph">Nuestra dulcería se dedica a endulzar
                                    la vida de nuestros clientes ofreciendo una amplia
                                    variedad de dulces y refrescos de alta calidad. 
                                    Nuestro objetivo es convertirnos en el lugar preferido 
                                    para satisfacer los antojos dulces, brindando
                                    experiencias únicas y sabores irresistibles.
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <div class="vision"><h3><span>Visión</span></h3></div>
                                <p id="vision-paragraph">Ser reconocidos como la dulcería líder 
                                    en la fabricación de refrescos y venta de dulces, 
                                    destacando por nuestra calidad, innovación y la
                                    experiencia dulce que brindamos a nuestros clientes.
                                    También nos impulsamos a superar constantemente nuestros
                                    límites y elevar la experiencia dulce a nuevos niveles.
                                    Nos enorgullece brindar momentos de felicidad y
                                    satisfacción a nuestros clientes.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>  
        </div>
    </div>
    <!-- <?php include 'includes/footer.php'; ?> -->
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
