<?php
//TODO se incluyen los archivos necesarios
require_once("../config/conexion.php");
require_once("../models/Empresa.php");
/* TODO se crea una instancia de la clase empresa */
$empresa = new Empresa();
/* TODO se utiliza un switch para determinar que accion realizar */
switch ($_GET["op"]) {
    /* TODO accion de insertar e editar */
  case "guardaryeditar":
    if (empty($_POST["emp_id"])) {
      $empresa->insert_empresa($_POST["emp_nom"], $_POST["emp_porcen"]);
    } else {
      $empresa->update_empresa($_POST["emp_id"], $_POST["emp_nom"], $_POST["emp_porcen"]);
    }
    break;
    /* TODO  accion de listar todas las empresas */
  case "listar":
    $datos = $empresa->get_empresa();
    $data = array();
    foreach ($datos as $row) {
      $sub_array = array();
      $sub_array[] = $row["emp_nom"];
      $sub_array[] = $row["emp_porcen"];
      $sub_array[] = '<button type="button" onClick="editar(' . $row["emp_id"] . ')" id="' . $row["emp_id"] . '" ></button>';
      $sub_array[] = '<button type="button" onClick="eliminar(' . $row["emp_id"] . ')" id="' . $row["emp_id"] . '" ></button>';
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
    /* TODO mostrar una empresa en especifico */
  case "mostrar":
    $datos = $empresa->get_empresa_x_id($_POST["emp_id"]);
    if (is_array($datos) == true and count($datos) > 0) {
      foreach ($datos as $row) {
        $output["emp_id"] = $row["emp_id"];
        $output["emp_nom"] = $row["emp_nom"];
        $output["emp_porcen"] = $row["emp_porcen"];
      }
      echo json_encode($output);
    }
    break;
    /* TODO eliminar una empresa */
  case "eliminar":
    $empresa->delete_empresa($_POST["emp_id"]);
    break;
    /* TODO accion para mostrar option */
  case "combo":
    $datos = $empresa->get_empresa();
    if (is_array($datos) == true and count($datos) > 0) {
      $html = "";
      $html .= "<option selected>Seleccionar</option>";
      foreach ($datos as $row) {
        $html .= "<option value='" . $row["emp_id"] . "'>" . $row["emp_id"] . "</option>";
      }
      echo $html;
    }
    break;
}
