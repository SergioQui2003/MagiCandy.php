<?php
include 'includes/session.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {
    // Verifica si se envió el formulario
    if (isset($_POST['email'])) {
        // Procesa el restablecimiento de la contraseña y envía el correo electrónico
        $email = $_POST['email'];
        
        // Aquí debes agregar la lógica para restablecer la contraseña si es necesario
        
        // Envía el correo electrónico
        $subject = "Solicitud de restablecimiento de contraseña";
        $message = "Por favor, sigue este enlace para restablecer tu contraseña: [enlace de restablecimiento]";
        $headers = "From: tu_correo@dominio.com";

        if (mail($email, $subject, $message, $headers)) {
            $_SESSION['success'] = "Se ha enviado un correo electrónico con instrucciones para restablecer tu contraseña.";
            header("Location: login.php"); // Redirige a la página de inicio de sesión
            exit();
        } else {
            $_SESSION['error'] = "Hubo un error al enviar el correo electrónico. Por favor, inténtalo de nuevo más tarde.";
        }
    } else {
        $_SESSION['error'] = "Por favor, proporciona una dirección de correo electrónico válida.";
    }
}
?>

<body class="hold-transition login-page">
    <div class="login-box">
        <?php
        if(isset($_SESSION['error'])){
            echo "<div class='callout callout-danger text-center'>
                    <p>".$_SESSION['error']."</p> 
                  </div>";
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
            echo "<div class='callout callout-success text-center'>
                    <p>".$_SESSION['success']."</p> 
                  </div>";
            unset($_SESSION['success']);
        }
        ?>
        <div class="login-box-body">
            <p class="login-box-msg">Ingrese el correo electrónico asociado con la cuenta</p>

            <form action="reset.php" method="POST">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control input-lg" name="email" placeholder="Correo electrónico" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg btn-flat" name="reset" style="background-color: #049FFF; height: 40px;"><i class="fa fa-mail-forward"></i> Enviar</button>
                    </div>
                </div>
            </form>
            <br>
            <div class="text-center" style="color: #049FFF;">
                <a href="login.php" style="color: #049FFF;">Recuerdo mi contraseña</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="index.php" style="color: #049FFF;"><i class="fa fa-home"></i> Volver al inicio</a>
            </div>
        </div>
    </div>
    <?php include 'includes/scripts.php' ?>
</body>
</html>
