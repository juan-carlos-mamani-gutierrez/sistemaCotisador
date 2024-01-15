<?php
require_once('../../config/conexion.php');
if (isset($_SESSION['usu_id'])) {

?>
  <!DOCTYPE html>
  <html lang="es">

  <head>

    <title> Nueva Cotizacion | Cotizador </title>
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
          <li class="breadcrumb-item"><a href="javascript:;">Nueva Cotizacion</a></li>
         
        </ol>
        <!-- end breadcrumb -->
      
        <h1 class="page-header">Nueva cotizacion<small>Creacion y registro de informacion</small></h1>
      
        <!-- TODO: paso 1 -->
        <div class="panel panel-inverse">
          <div class="panel-heading">
            <h4 class="panel-title">Paso 1</h4>
            <div class="panel-heading-btn">
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

            </div>
          </div>
          <div class="panel-body">
          <fieldset>
				<!-- TODO select id -->
				<div class="form-group">
				<label for="cli_id">Cliente</label>
				<select id="cli_id" name="cli_id" class="default-select2 form-control">
			    </select>
				</div>
				<!-- TODO select id -->
				<div class="form-group">
				<label for="con_id">Contacto</label>
				<select id="con_id" name="con_id" class="default-select2 form-control">
			    </select>
				</div>
	            <!-- TODO Imput de RUC -->
	            <div class="form-group">
	              <label for="cli_ruc">Ruc</label>
	              <input type="text" class="form-control" id="cli_ruc" name="cli_ruc" placeholder="Ingresar el RUC" required>
	            </div>
	            <!-- TODO Imput de Telefono -->
	            <div class="form-group">
	              <label for="con_telf">Telefono Contacto</label>
	              <input type="email" class="form-control" id="con_telf" name="con_telf" pattern="[0-9]{8}" placeholder="ej .71234567" required>
	            </div>
	            <!-- TODO Imput de Email -->
	            <div class="form-group">
	              <label for="con_email">Email Contacto</label>
	              <input type="tel" class="form-control" id="con_email" name="con_email" placeholder="Ingrese Email" required>
	            </div>
                <!-- TODO text area-->
                <div class="form-group">
                    <label for="coti_descrip"></label>
                    <textarea type="text" class="form-control" id="coti_descrip" name="coti_descrip" placeholder="Ingrese Descripcion" rows="3"></textarea>
                </div>
	          </fieldset>
          </div>
        </div>
        <!-- end panel -->
        <!-- TODO: Paso 2 -->
        <div class="panel panel-inverse">
          <div class="panel-heading">
            <h4 class="panel-title">Paso 2</h4>
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
        <!-- TODO: paso 3 -->
        <div class="panel panel-inverse">
          <div class="panel-heading">
            <h4 class="panel-title">Paso 3</h4>
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
        <!-- TODO paso 4 -->
        <div class="panel panel-inverse">
          <div class="panel-heading">
            <h4 class="panel-title">Paso 4</h4>
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
  <script src="nuevacotizacion.js"></script>
  </body>

  </html>

<?php
} else {
  header('Location:' . Conectar::ruta() . 'index.php');
}
?>