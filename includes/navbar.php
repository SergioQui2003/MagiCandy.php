<header class="main-header">
  <nav class="navbar navbar-static-top bg-white">
    <div class="container">
      <div class="navbar-header">
        <a href="index.php"><img class="logo" src="../images/Logo.webp" alt="Logo" height="70px" width="200px"></a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Recopile los enlaces de navegación, formularios y otro contenido para alternar -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">INICIO</a></li>
         
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">CATEGORIAS <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <?php
             
                $conn = $pdo->open();
                try{
                  $stmt = $conn->prepare("SELECT * FROM category");
                  $stmt->execute();
                  foreach($stmt as $row){
                    echo "
                      <li><a href='category.php?category=".$row['cat_slug']."'>".$row['name']."</a></li>
                    ";                  
                  }
                }
                catch(PDOException $e){
                  echo "Hay algún problema en la conexión.: " . $e->getMessage();
                }

                $pdo->close();

              ?>
            </ul>
          </li>
          <li><a href="sobrenosotros.php">NOSOTROS</a></li>
          <li><a href="contacto.php">CONTACTANOS</a></li>
        </ul>
        <form method="POST" class="navbar-form navbar-left" action="search.php">
          <div class="input-group">
              <input type="text" class="form-control" id="navbar-search-input" name="keyword" placeholder="Buscar producto" required>
              <span class="input-group-btn" id="searchBtn" style="display:none;">
                  <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i> </button>
              </span>
          </div>
        </form>
      </div>
      <!-- /.navbar-colapso-->
      <!--Menú derecho de la barra de navegación-->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <!-- Botón de alternar menú -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-shopping-cart"></i>
              <span class="label label-success cart_count"></span>
            </a>
            <ul class="dropdown-menu">
            <li class="header" style="text-align: center;">Tienes <span class="cart_count"></span> artículos en el carrito</li>
              <li>
                <ul class="menu" id="cart_menu">
                </ul>
              </li>
              <li class="footer"><a href="cart_view.php"><strong>Ver Carrito</strong></a></li>
            </ul>
          </li>
          <?php
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
              echo '
                <li class="dropdown user user-menu" >
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="'.$image.'" class="user-image" alt="User Image">
                    <span class="hidden-xs">'.$user['firstname'].' '.$user['lastname'].'</span>
                  </a>
                  <ul class="dropdown-menu" >
                    <!-- User image -->
                    <li class="user-header" style="background-color: #1d71b8; color: #ffffff;">
                      <img src="'.$image.'" class="img-circle" alt="User Image">
                      <p>
                        '.$user['firstname'].' '.$user['lastname'].'
                        <small>Miembro desde '.date('M. Y', strtotime($user['created_on'])).'</small>
                      </p>
                    </li>

                    <li class="user-footer">
                      <div class="pull-left">
                      <a href="profile.php" class="btn btn-default btn-flat" style="background-color: #009fe3; color: #ffffff;">Perfil</a>
                      </div>
                      <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat" style="background-color: #e30613; color: #ffffff;">Cerrar Sesión</a>
                      </div>
                    </li>
                  </ul>
                </li>
              ';
            }
            else{
              echo "
                <li><a href='login.php'>INICIAR SESIÓN</a></li>
                <li><a href='signup.php'>REGISTRATE</a></li>
              ";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
