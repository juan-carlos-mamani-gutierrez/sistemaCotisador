<?php
require_once('../../config/conexion.php');
if (isset($_SESSION['usu_id'])) {

?>
  <!DOCTYPE html>
  <html lang="es">

  <head>

    <title> Contacto | Cotizador </title>
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
          <li class="breadcrumb-item active"><a href="javascript:;">Contacto</a></li>

        </ol>
        <!-- TODO titulo -->
        <h1 class="page-header">Contacto <small>Registro, Modificacion y Eliminacion de Registros </small></h1>
        <!-- end page-header -->
        <!-- TODO panel -->
        <div class="panel panel-inverse">
          <div class="panel-heading">
            <h4 class="panel-title">Mantenimiento de Contacto</h4>
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

            </div>
          </div>
          <!-- TODO boton de registrar -->
          <div class="panel-body">
            <button type="button" id="btnnuevo" class="btn btn-primary my-2">
              Nuevo Registro
            </button>

            <!-- TODO tabla -->
            <table id="lista_data" class="table table-striped table-bordered table-td-valign-middle">
              <thead>
                <tr>
                  <th class="text-nowrap">Cliente</th>
                  <th class="text-nowrap">Cargo</th>
                  <th class="text-nowrap">Nombre</th>
                  <th class="text-nowrap">Email</th>
                  <th class="text-nowrap">Telefono</th>
                  <th width="1%"></th>
                  <th width="1%"></th>
                </tr>
              </thead>
              <tbody>


              </tbody>
            </table>
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
    <?php require_once('mnt.php'); ?>
    <!-- ================== BEGIN BASE JS ================== -->
    <?php require_once('../Html/Js.php'); ?>
    <script src="contacto.js"></script>
    <!-- ================== END BASE JS ================== -->

  </body>

  </html>

<?php
} else {
  header('Location:' . Conectar::ruta() . 'index.php');
}
?>