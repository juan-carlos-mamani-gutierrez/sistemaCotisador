<?php
//TODO se incluyen los archivos necesarios
require_once("../config/conexion.php");
require_once("../models/Contacto.php");
/* TODO se crea una instancia de la clase contacto */
$contacto = new Contacto();
/* TODO se utiliza un switch para determinar que accion realizar */
switch ($_GET["op"]) {
    /* TODO accion de insertar e editar */
  case "guardaryeditar":
    if (empty($_POST["con_id"])) {
      $contacto->insert_contacto($_POST["cli_id"], $_POST["car_id"], $_POST["con_nom"], $_POST["con_email"], $_POST["con_telf"]);
    } else {
      $contacto->update_contacto($_POST["con_id"], $_POST["cli_id"], $_POST["car_id"], $_POST["con_nom"], $_POST["con_email"], $_POST["con_telf"]);
    }
    break;
    /* TODO  accion de listar todas las contacto */
  case "listar":
    $datos = $contacto->get_contacto();
    $data = array();
    foreach ($datos as $row) {
      $sub_array = array();
      $sub_array[] = $row["cli_id"];
      $sub_array[] = $row["car_id"];
      $sub_array[] = $row["con_nom"];
      $sub_array[] = $row["con_email"];
      $sub_array[] = $row["con_telf"];
      $sub_array[] = '<button type="button" onClick="editar(' . $row["con_id"] . ')" id="' . $row["con_id"] . '" class="btn btn-warning btn-xs">Editar</button>';
      $sub_array[] = '<button type="button" onClick="eliminar(' . $row["con_id"] . ')" id="' . $row["con_id"] . '" class="btn btn-danger btn-xs" >Eliminar</button>';
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
    /* TODO mostrar una contacto en especifico */
  case "mostrar":
    $datos = $contacto->get_contacto_x_id($_POST["con_id"]);
    if (is_array($datos) == true and count($datos) > 0) {
      foreach ($datos as $row) {
        $output["con_id"] = $row["con_id"];
        $output["cli_id"] = $row["cli_id"];
        $output["car_id"] = $row["car_id"];
        $output["con_nom"] = $row["con_nom"];
        $output["con_email"] = $row["con_email"];
        $output["con_telf"] = $row["con_telf"];
      }
      echo json_encode($output);
    }
    break;
    /* TODO eliminar una contacto */
  case "eliminar":
    $contacto->delete_contacto($_POST["con_id"]);
    break;
    /* TODO accion para mostrar option */
  case "combo":
    $datos = $contacto->get_contacto();
    if (is_array($datos) == true and count($datos) > 0) {
      $html = "";
      $html .= "<option selected>Seleccionar</option>";
      foreach ($datos as $row) {
        $html .= "<option value='" . $row["con_id"] . "'>" . $row["con_id"] . "</option>";
      }
      echo $html;
    }
    break;
}
