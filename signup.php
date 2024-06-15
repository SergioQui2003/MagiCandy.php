<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
    exit;
  }

  if(isset($_SESSION['captcha'])){
    $now = time();
    if($now >= $_SESSION['captcha']){
      unset($_SESSION['captcha']);
    }
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition register-page" style="background-image: url('images/FondoBody.webp'); background-size: cover; display: flex; align-items: center; justify-content: center; height: 100vh;">
  <div class="register-box">
    <?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".htmlspecialchars($_SESSION['error'])."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".htmlspecialchars($_SESSION['success'])."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
    <div class="register-box-body" style="background-color: #fff; border-radius: 10px; padding: 20px;">
      <strong><p class="login-box-msg" style="color: #333;">Registrarme</p></strong>

      <form action="register.php" method="POST" id="registerForm">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="firstname" placeholder="Nombres" pattern="[A-Za-z\s]{3,25}" title="Por favor, ingresa solo letras y espacios, con longitud entre 3 y 25 caracteres." value="<?php echo isset($_SESSION['firstname']) ? htmlspecialchars($_SESSION['firstname']) : ''; ?>" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="lastname" placeholder="Apellidos" pattern="[A-Za-z\s]{4,25}" title="Por favor, ingresa solo letras y espacios, con longitud entre 4 y 25 caracteres." value="<?php echo isset($_SESSION['lastname']) ? htmlspecialchars($_SESSION['lastname']) : ''; ?>" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" placeholder="Correo electrónico" pattern="[a-zA-Z0-9._%+-]+@gmail\.com" title="Por favor, ingresa un correo electrónico de Gmail válido" value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" minlength="6" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}" title="La contraseña debe tener al menos 6 caracteres, incluyendo una letra mayúscula, una letra minúscula, un número y un carácter especial" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <span class="error text-danger" id="passwordError" style="display: none;">La contraseña es demasiado común.</span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="repassword" placeholder="Repetir Contraseña" pattern="[\S\s]{6,}" title="La contraseña debe tener al menos 6 caracteres" required>
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <?php
          if(!isset($_SESSION['captcha'])){
            echo '
              <div class="form-group" style="width:100%;">
                <div class="g-recaptcha" data-sitekey="6LevO1IUAAAAAFX5PpmtEoCxwae-I8cCQrbhTfM6"></div>
              </div>
            ';
          } 
        ?>
        <hr>
        <div class="row">
          <div class="col-xs-10 col-xs-offset-1">
            <button type="submit" class="btn btn-primary btn-block" name="signup" style="background-color: #007bff; border-color: #007bff;"><i class="fa fa-pencil"></i> Regístrate</button>
          </div>
        </div>
      </form>
      <br>
      <div class="text-center">
        <a href="index.php" class="btn btn-link enlace" style="color: #007bff;"><i class="fa fa-home"></i> Volver al inicio</a>
        <a href="login.php" class="btn btn-link enlace" style="color: #007bff;">Ya estoy registrado</a>
      </div>
    </div>
  </div>

  <?php include 'includes/scripts.php' ?>
  <script>
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        const password = document.getElementById('password').value;
        const errorElement = document.getElementById('passwordError');
        const commonPasswords = ['123456', 'password', '12345678', 'qwerty', 'abc123', 'password1'];

        if (commonPasswords.includes(password)) {
            event.preventDefault();
            errorElement.style.display = 'block';
            errorElement.textContent = 'La contraseña es demasiado común.';
        } else {
            errorElement.style.display = 'none';
        }
    });
  </script>
</body>
</html>
