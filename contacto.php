<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav" style="background-color: white;">
<div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row" style="margin-top: 8%;">
                        <!-- Formulario -->
                        <div class="col-md-6">
                            <div style="background-color: white; padding: 20px; border-radius: 10px;">
                                <h2>Envíanos un mensaje</h2>
                                <form action="enviar.php" method="post">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Tu nombre" pattern="[A-Za-z ]{8,20}" title="Por favor, ingresa un nombre válido de 8 a 20 caracteres sin números ni caracteres especiales, pero el espacio está permitido." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Correo Electrónico</label>
                                        <input type="text" name="mail" class="form-control" id="mail" placeholder="Tu email" pattern="[^\s@]+@[^\s@]+\.[^\s@]+" title="Por favor, ingresa una dirección de correo electrónico válida " required>
                                    </div>
                                    <div class="form-group">
                                        <label>Asunto</label>
                                        <input type="text" name="subject" class="form-control" id="subject" placeholder="Asunto del Mensaje" pattern="[a-zA-Z\s]{5,30}" title="Por favor, ingresa un asunto válido de 5 a 30 caracteres sin números ni caracteres especiales, pero los espacios están permitidos." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mensaje</label>
                                        <textarea name="message" rows="3" id="message" placeholder="Escribe tu mensaje" pattern="[a-zA-Z0-9\s]{10,40}" title="Por favor, ingresa un mensaje válido de 10 a 40 caracteres alfanuméricos, pero los espacios están permitidos." required class="form-control"></textarea>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" style="background-color: #049FFF;">Enviar mensaje</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Google Maps Div -->
                        <div class="col-md-6">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3339.243845448843!2d-73.34207227261464!3d5.559231465179172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e6a7c0cbaf99a11%3A0x99740e91a3e931d1!2zQ2wgNTksIFR1bmphLCBCb3lhY8Oh!5e0!3m2!1ses-419!2sco!4v1718401025841!5m2!1ses-419!2sco" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
