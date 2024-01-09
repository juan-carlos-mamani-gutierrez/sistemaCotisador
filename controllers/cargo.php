<?php
//TODO se incluyen los archivos necesarios
require_once("../config/conexion.php");
require_once("../models/Cargo.php");
/* TODO se crea una instancia de la clase categoria */
$cargo = new Cargo();
/* TODO se utiliza un switch para determinar que accion realizar */
switch ($_GET["op"]) {
    /* TODO accion de insertar e editar */
  case "guardaryeditar":
    if (empty($_POST["cat_id"])) {
      $cargo->insert_cargo($_POST["car_nom"]);
    } else {
      $cargo->update_cargo($_POST["car_id"], $_POST["car_nom"]);
    }
    break;
    /* TODO  accion de listar todas las categorias */
  case "listar":
    $datos = $cargo->get_cargo();
    $data = array();
    foreach ($datos as $row) {
      $sub_array = array();
      $sub_array[] = $row["car_nom"];
      $sub_array[] = '<button type="button" onClick="editar(' . $row["car_id"] . ')" id="' . $row["car_id"] . '" class="btn btn-warning btn-xs">Editar</button>';
      $sub_array[] = '<button type="button" onClick="eliminar(' . $row["car_id"] . ')" id="' . $row["car_id"] . '" class="btn btn-danger btn-xs" >Eliminar</button>';
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
    $datos = $cargo->get_cargo_x_id($_POST["car_id"]);
    if (is_array($datos) == true and count($datos) > 0) {
      foreach ($datos as $row) {
        $output["car_id"] = $row["car_id"];
        $output["car_nom"] = $row["car_nom"];
      }
      echo json_encode($output);
    }
    break;
    /* TODO eliminar una categoria */
  case "eliminar":
    $categoria->delete_categoria($_POST["car_id"]);
    break;
    /* TODO accion para mostrar option */
  case "combo":
    $datos = $cargo->get_cargo();
    if (is_array($datos) == true and count($datos) > 0) {
      $html = "";
      $html .= "<option selected>Seleccionar</option>";
      foreach ($datos as $row) {
        $html .= "<option value='" . $row["car_id"] . "'>" . $row["car_nom"] . "</option>";
      }
      echo $html;
    }
    break;
}
