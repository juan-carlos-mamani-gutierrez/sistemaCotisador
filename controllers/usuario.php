<?php
//TODO se incluyen los archivos necesarios
require_once("../config/conexion.php");
require_once("../models/Usuario.php");
/* TODO se crea una instancia de la clase usuario */
$usuario = new Usuario();
/* TODO se utiliza un switch para determinar que accion realizar */
switch ($_GET["op"]) {
    /* TODO accion de insertar e editar */
  case "guardaryeditar":
    if (empty($_POST["usu_id"])) {
      $usuario->insert_usuario($_POST["usu_correo"], $_POST["usu_nom"], $_POST["usu_pass"]);
    } else {
      $usuario->update_usuario($_POST["usu_id"], $_POST["usu_correo"], $_POST["usu_nom"], $_POST["usu_pass"]);
    }
    break;
    /* TODO  accion de listar todas las usuario */
  case "listar":
    $datos = $usuario->get_usuario();
    $data = array();
    foreach ($datos as $row) {
      $sub_array = array();
      $sub_array[] = $row["usu_correo"];
      $sub_array[] = $row["usu_nom"];
      $sub_array[] = $row["usu_pass"];
      $sub_array[] = '<button type="button" onClick="editar(' . $row["usu_id"] . ')" id="' . $row["usu_id"] . '" ></button>';
      $sub_array[] = '<button type="button" onClick="eliminar(' . $row["usu_id"] . ')" id="' . $row["usu_id"] . '" ></button>';
      $data[] = $sub_array;
    }

    $results = array(
      "sEcho" => 1,
      "iTotalRecords" => count($data),
      "iTotalDisplayRecords" => count($data),
      "aaData" => $data
    );
    echo json_encode($results);

    break;
    /* TODO mostrar una usuario en especifico */
  case "mostrar":
    $datos = $usuario->get_usuario_x_id($_POST["usu_id"]);
    if (is_array($datos) == true and count($datos) > 0) {
      foreach ($datos as $row) {
        $output["usu_id"] = $row["usu_id"];
        $output["usu_correo"] = $row["usu_correo"];
        $output["usu_nom"] = $row["usu_nom"];
        $output["usu_pass"] = $row["usu_pass"];
      }
      echo json_encode($output);
    }
    break;

    /* TODO eliminar una usuario */
  case "eliminar":
    $usuario->delete_usuario($_POST["usu_id"]);
    break;
    /* TODO accion para mostrar option */
  case "combo":
    $datos = $usuario->get_usuario();
    if (is_array($datos) == true and count($datos) > 0) {
      $html = "";
      $html .= "<option selected>Seleccionar</option>";
      foreach ($datos as $row) {
        $html .= "<option value='" . $row["usu_id"] . "'>" . $row["usu_id"] . "</option>";
      }
      echo $html;
    }
    break;
}
