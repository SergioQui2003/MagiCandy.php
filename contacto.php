<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav" style="background-color: white;">
<div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div style="background-color: white; padding: 20px; border-radius: 10px; margin-top: 8%;">
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
            </div>
        </div>
    </div>
    
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>
