<aside class="main-sidebar bg-primary" style="background-color: #1d71b8;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p style="color: #ffffff;"><?php echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a style="color: #44F814;"><i class="fa fa-circle text-success" style="color: #44F814;"></i> Disponible</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <!-- MENU PRINCIPAL -->
      <li><a href="home.php" style="color: #ffffff;"><i class="fa fa-home"></i> <span>INICIO</span></a></li>
      <li class="treeview">
        <a href="#" style="color: #ffffff;">       
          <i class="fa fa-user"></i>
          <span>CLIENTES</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu bg-primary">
          <li><a href="users.php" style="color: #ffffff;"><i class="fa fa-circle-o"></i>Información Clientes</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#" style="color: #ffffff;">
          <i class="fa fa-archive"></i>
          <span>INVENTARIO</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu bg-primary">
          <li><a href="products.php" style="color: #ffffff;"><i class="fa fa-circle-o"></i> Productos</a></li>
          <li><a href="category.php" style="color: #ffffff;"><i class="fa fa-circle-o"></i> Categoría</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#" style="color: #ffffff;">       
          <i class="fa fa-money"></i>
          <span>CONSULTAR VENTAS</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu bg-primary">
          <li><a href="sales.php" style="color: #ffffff;"><i class="fa fa-circle-o"></i> <span>Ventas</span></a></li>
        </ul>
      </li>  
    </ul>
  </section>
</aside>

<style>
  .sidebar-menu > li:hover > a,
  .sidebar-menu > li.active > a,
  .treeview-menu > li > a {
    background-color: #1d71b8 !important;
  }
  .main-sidebar,
  .main-sidebar .sidebar-menu {
    background-color: #1d71b8 !important;
  }
</style>
