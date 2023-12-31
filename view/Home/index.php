<?php
require_once('../../config/conexion.php');
if (isset($_SESSION['usu_id'])) {

?>
  <!DOCTYPE html>
  <html lang="es">

  <head>

    <title> Home | Cotizador </title>
    <?php require_once('../Html/Head.php'); ?>
  </head>

  <body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">

      <?php require_once('../Html/Header.php'); ?>

      <?php require_once('../Html/Sidebar.php'); ?>

      <!-- begin #content -->
      <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb float-xl-right">
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
          <li class="breadcrumb-item active">Blank Page</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Blank Page <small>header small text goes here...</small></h1>
        <!-- end page-header -->
        <!-- begin panel -->
        <div class="panel panel-inverse">
          <div class="panel-heading">
            <h4 class="panel-title">Panel Title here</h4>
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

            </div>
          </div>
          <div class="panel-body">
            Panel Content Here
          </div>
        </div>
        <!-- end panel -->
      </div>
      <!-- end #content -->

      <!-- begin scroll to top btn -->
      <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
      <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <?php require_once('../Html/Js.php'); ?>
    <!-- ================== END BASE JS ================== -->

  </body>

  </html>

<?php
} else {
  header('Location:' . Conectar::ruta() . 'index.php');
}
?>