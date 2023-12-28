<?php
require_once("config/conexion.php");
if (isset($_POST["enviar"]) and $_POST["enviar"] == "si") {
  require_once("models/Usuario.php");
  $usuario = new Usuario();
  $usuario->login();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Aceso | Login Cotizador</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  <meta content="" name="description">
  <meta content="" name="author">

  <!-- ================== BEGIN BASE CSS STYLE ================== -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="assets\css\default\app.min.css" rel="stylesheet">
  <!-- ================== END BASE CSS STYLE ================== -->
</head>

<body class="pace-top">
  <!-- begin #page-loader -->
  <div id="page-loader" class="fade show"><span class="spinner"></span></div>
  <!-- end #page-loader -->

  <!-- begin login-cover -->
  <div class="login-cover">
    <div class="login-cover-image" style="background-image: url(assets/img/login-bg/login-bg-17.jpeg)" data-id="login-cover-image"></div>
    <div class="login-cover-bg"></div>
  </div>
  <!-- end login-cover -->

  <!-- begin #page-container -->
  <div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login login-v2" data-pageload-addclass="animated fadeIn">
      <!-- begin brand -->
      <div class="login-header">
        <div class="brand">
          <span class="logo"></span> <b>Cotizador</b> RM
          <small>Ingrese Usuario y Contrasna</small>
        </div>
        <div class="icon">
          <i class="fa fa-lock"></i>
        </div>
      </div>
      <!-- end brand -->
      <!-- begin login-content -->
      <div class="login-content">

        <form action="" method="post" class="margin-bottom-0">

          <?php
          if (isset($_GET["m"])) {
            switch ($_GET["m"]) {
              case "1":
          ?>
                <div class="alert alert-danger fade show">
                  <span class="close" data-dismiss="alert">x</span>
                  <strong>Error</strong> Datos Incorrectos
                </div>
              <?php
                break;
              case "2":
              ?>
                <div class="alert alert-danger fade show">
                  <span class="close" data-dismiss="alert">x</span>
                  <strong>Error</strong> Campos Vacios
                </div>
          <?php
                break;
            }
          }
          ?>


          <div class="form-group m-b-20">
            <input type="text" id="usu_correo" name="usu_correo" class="form-control form-control-lg" placeholder="Correo Electronico" required="">
          </div>
          <div class="form-group m-b-20">
            <input type="password" id="usu_pass" name="usu_pass" class="form-control form-control-lg" placeholder="Password" required="">
          </div>
          <div class="checkbox checkbox-css m-b-20">
            <input type="checkbox" id="remember_checkbox">
            <label for="remember_checkbox">
              Recordar
            </label>
          </div>
          <div class="login-buttons">
            <input type="hidden" name="enviar" value="si">
            <button type="submit" class="btn btn-success btn-block btn-lg">Acceder</button>
          </div>

        </form>
      </div>
      <!-- end login-content -->
    </div>
    <!-- end login -->




  </div>
  <!-- end page container -->

  <!-- ================== BEGIN BASE JS ================== -->
  <script src="assets\js\app.min.js"></script>
  <script src="assets\js\theme\default.min.js"></script>
  <!-- ================== END BASE JS ================== -->

  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="assets\js\demo\login-v2.demo.js"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->

</body>

</html>