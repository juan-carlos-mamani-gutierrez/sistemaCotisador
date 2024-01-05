<?php
//TODO se incluyen los archivos necesarios
require_once("../config/conexion.php");
require_once("../models/Cliente.php");
/* TODO se crea una instancia de la clase categoria */
$cliente = new Cliente();
/* TODO se utiliza un switch para determinar que accion realizar */
switch ($_GET["op"]) {
    /* TODO accion de insertar e editar */
  case "guardaryeditar":
    if (empty($_POST["cli_id"])) {
      $cliente->insert_cliente($_POST["cli_nom"], $_POST["cli_ruc"], $_POST["cli_telf"], $_POST["cli_email"]);
    } else {
      $cliente->update_cliente($_POST["cli_id"], $_POST["cli_nom"], $_POST["cli_ruc"], $_POST["cli_telf"], $_POST["cli_email"]);
    }
    break;
    /* TODO  accion de listar todas los CLientes */
  case "listar":
    $datos = $cliente->get_cliente();
    $data = array();
    foreach ($datos as $row) {
      $sub_array = array();
      $sub_array[] = $row["cli_nom"];
      $sub_array[] = $row["cli_ruc"];
      $sub_array[] = $row["cli_telf"];
      $sub_array[] = $row["cli_email"];
      $sub_array[] = '<button type="button" onClick="editar(' . $row["cli_id"] . ')" id="' . $row["cli_id"] . '" class="btn btn-warning btn-xs">Editar</button>';
      $sub_array[] = '<button type="button" onClick="eliminar(' . $row["cli_id"] . ')" id="' . $row["cli_id"] . '" class="btn btn-danger btn-xs" >Eliminar</button>';
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
    /* TODO mostrar una categoria en especifico */
  case "mostrar":
    $datos = $cliente->get_cliente_x_id($_POST["cli_id"]);
    if (is_array($datos) == true and count($datos) > 0) {
      foreach ($datos as $row) {
        $output["cli_id"] = $row["cli_id"];
        $output["cli_nom"] = $row["cli_nom"];
        $output["cli_ruc"] = $row["cli_ruc"];
        $output["cli_telf"] = $row["cli_telf"];
        $output["cli_email"] = $row["cli_email"];
      }
      echo json_encode($output);
    }
    break;
    /* TODO eliminar una categoria */
  case "eliminar":
    $cliente->delete_cliente($_POST["cli_id"]);
    break;
    /* TODO accion para mostrar option */
  case "combo":
    $datos = $cliente->get_cliente();
    if (is_array($datos) == true and count($datos) > 0) {
      $html = "";
      $html .= "<option selected>Seleccionar</option>";
      foreach ($datos as $row) {
        $html .= "<option value='" . $row["cli_id"] . "'>" . $row["cli_id"] . "</option>";
      }
      echo $html;
    }
    break;
}
