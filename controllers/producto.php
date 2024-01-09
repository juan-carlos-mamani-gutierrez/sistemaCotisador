<?php
//TODO se incluyen los archivos necesarios
require_once("../config/conexion.php");
require_once("../models/Producto.php");
/* TODO se crea una instancia de la clase categoria */
$producto = new Producto();
/* TODO se utiliza un switch para determinar que accion realizar */
switch ($_GET["op"]) {
    /* TODO accion de insertar e editar */
  case "guardaryeditar":
    if (empty($_POST["prod_id"])) {
      $producto->insert_producto($_POST["cat_id"], $_POST["prod_nom"], $_POST["prod_descrip"], $_POST["prod_precio"]);
    } else {
      $producto->update_producto($_POST["prod_id"], $_POST["cat_id"], $_POST["prod_nom"], $_POST["prod_descrip"], $_POST["prod_precio"]);
    }
    break;
    /* TODO  accion de listar todas las productos */
  case "listar":
    $datos = $producto->get_producto();
    $data = array();
    foreach ($datos as $row) {
      $sub_array = array();
      $sub_array[] = $row["cat_nom"];
      $sub_array[] = $row["prod_nom"];
      $sub_array[] = $row["prod_descrip"];
      $sub_array[] = $row["prod_precio"];
      $sub_array[] = '<button type="button" onClick="editar(' . $row["prod_id"] . ')" id="' . $row["prod_id"] . '" class="btn btn-warning btn-xs">Editar</button>';
      $sub_array[] = '<button type="button" onClick="eliminar(' . $row["prod_id"] . ')" id="' . $row["prod_id"] . '" class="btn btn-danger btn-xs" >Eliminar</button>';
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
    /* TODO mostrar una producto en especifico */
  case "mostrar":
    $datos = $producto->get_producto_x_id($_POST["prod_id"]);
    if (is_array($datos) == true and count($datos) > 0) {
      foreach ($datos as $row) {
        $output["prod_id"] = $row["prod_id"];
        $output["cat_id"] = $row["cat_id"];
        $output["prod_nom"] = $row["prod_nom"];
        $output["prod_descrip"] = $row["prod_descrip"];
        $output["prod_precio"] = $row["prod_precio"];
      }
      echo json_encode($output);
    }
    break;
    /* TODO eliminar una producto */
  case "eliminar":
    $producto->delete_producto($_POST["prod_id"]);
    break;
    /* TODO accion para mostrar option */
  case "combo":
    $datos = $producto->get_producto();
    if (is_array($datos) == true and count($datos) > 0) {
      $html = "";
      $html .= "<option selected>Seleccionar</option>";
      foreach ($datos as $row) {
        $html .= "<option value='" . $row["prod_id"] . "'>" . $row["prod_nom"] . "</option>";
      }
      echo $html;
    }
    break;
}
