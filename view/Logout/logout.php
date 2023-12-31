<?php
require_once('../../config/conexion.php');
/* TODO Destruimos la session */
session_destroy();
/* TODO luego de cerrar session enviar a la pantalla de login */
header('Location:' . Conectar::ruta() . 'index.php');
exit();
