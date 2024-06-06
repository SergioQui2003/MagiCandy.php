<?php
// Array de meses en español
$meses_es = array(
  'Jan' => 'Enero',
  'Feb' => 'Febrero',
  'Mar' => 'Marzo',
  'Apr' => 'Abril',
  'May' => 'Mayo',
  'Jun' => 'Junio',
  'Jul' => 'Julio',
  'Aug' => 'Agosto',
  'Sep' => 'Septiembre',
  'Oct' => 'Octubre',
  'Nov' => 'Noviembre',
  'Dec' => 'Diciembre'
);

// Fecha de creación del usuario
$fecha_creacion = strtotime($admin['created_on']);
$mes_ingles = date('M', $fecha_creacion);
$anio = date('Y', $fecha_creacion);

// Traducir mes
$mes_espanol = $meses_es[$mes_ingles];
?>

<header class="main-header bg-blue" style="background-color: #049FFF;">
  <!-- Logo -->
  <a href="#" class="logo" style="background-color: #049FFF;">
    <!-- logo para estado regular y dispositivos móviles -->
    <span class="logo-lg" style="margin-left: 26px;">
      <img src="../images/Logo.webp" alt="Logo Grande" class="img-responsive" width="150" height="100">
    </span>
    <!-- Texto "MG" -->
    <span class="logo-text d-none d-md-block">MG</span>
  </a>
  <!-- Barra de navegación de encabezado: el estilo se puede encontrar en header.less -->
  <nav class="navbar navbar-static-top navbar-custom" style="background-color: #049FFF;">
    <!-- Botón de alternancia de la barra lateral-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Alternar navegación</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Cuenta de usuario: el estilo se puede encontrar en el menú desplegable. -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="Imagen de usuario">
            <span class="hidden-xs"><?php echo $admin['firstname'].' '.$admin['lastname']; ?></span>
          </a>
          <ul class="dropdown-menu" >
            <!-- Imagen de usuario -->
            <li class="user-header" style="background-color: #1d71b8;">
              <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="Imagen de usuario">

              <p>
                <?php echo $admin['firstname'].' '.$admin['lastname']; ?>
                <small>Miembro desde <?php echo $mes_espanol . ' ' . $anio; ?></small>
              </p>
            </li>
            <li class="user-footer">
            <div class="pull-left">
              <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile" style="background-color: #009fe3; color: white;">Perfil</a>
            </div>
            <div class="pull-right">
              <a href="../logout.php" class="btn btn-default btn-flat" style="background-color: #e30613; color: white;">Cerrar Sesión</a>
            </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php include 'includes/profile_modal.php'; ?>
