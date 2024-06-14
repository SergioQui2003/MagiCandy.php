<?php include 'includes/session.php'; ?>
<?php
if(isset($_SESSION['user'])){
    header('location: cart_view.php');
}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page" style="background-image: url('images/FondoBody.webp'); background-size: cover; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 20px 0;">
<div style="max-width: 400px; width: 100%;">

    <?php
    if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
    }
    ?>

    <div class="text-center"><img src="../images/Logo.webp" width="80%" height="80%"></div>
    <br>
    <div class="login-box-body">

        <h4 class="login-box-msg"><strong>Iniciar sesión</strong></h4>

        <form action="verify.php" method="POST">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="login" style="background-color: #049FFF; color: white;"><i class="fa fa-sign-in"></i> Ingresar</button>
                </div>
            </div>
        </form>
        <div style="text-align: center;">
            <br>
            <a href="password_forgot.php" style="color: #049FFF;">Olvidé mi contraseña</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
            <a href="signup.php" style="color: #049FFF;">Registrarme</a><br>
            <a href="index.php" style="color: #049FFF;"><i class="fa fa-home"></i> Volver al inicio</a>
        </div>
    </div>
</div>

<?php include 'includes/scripts.php' ?>
<script>
    // Enfocar el campo de correo electrónico cuando se carga la página
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('input[name="email"]').focus();
    });
</script>
</body>
</html>
