<?php
//TODO se incluyen los archivos necesarios
require_once("../config/conexion.php");
require_once("../models/Categoria.php");
/* TODO se crea una instancia de la clase categoria */
$categoria = new Categoria();
/* TODO se utiliza un switch para determinar que accion realizar */
switch ($_GET["op"]) {
    /* TODO accion de insertar e editar */
  case "guardaryeditar":
    if (empty($_POST["cat_id"])) {
      $categoria->insert_categoria($_POST["cat_nom"], $_POST["cat_descrip"]);
    } else {
      $categoria->update_categoria($_POST["cat_id"], $_POST["cat_nom"], $_POST["cat_descrip"]);
    }
    break;
    /* TODO  accion de listar todas las categorias */
  case "listar":
    $datos = $categoria->get_categoria();
    $data = array();
    foreach ($datos as $row) {
      $sub_array = array();
      $sub_array[] = $row["cat_nom"];
      $sub_array[] = $row["cat_descrip"];
      $sub_array[] = '<button type="button" onClick="editar(' . $row["cat_id"] . ')" id="' . $row["cat_id"] . '" class="btn btn-warning btn-xs">Editar</button>';
      $sub_array[] = '<button type="button" onClick="eliminar(' . $row["cat_id"] . ')" id="' . $row["cat_id"] . '" class="btn btn-danger btn-xs" >Eliminar</button>';
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
    $datos = $categoria->get_categoria_x_id($_POST["cat_id"]);
    if (is_array($datos) == true and count($datos) > 0) {
      foreach ($datos as $row) {
        $output["cat_id"] = $row["cat_id"];
        $output["cat_nom"] = $row["cat_nom"];
        $output["cat_descrip"] = $row["cat_descrip"];
      }
      echo json_encode($output);
    }
    break;
    /* TODO eliminar una categoria */
  case "eliminar":
    $categoria->delete_categoria($_POST["cat_id"]);
    break;
    /* TODO accion para mostrar option */
  case "combo":
    $datos = $categoria->get_categoria();
    if (is_array($datos) == true and count($datos) > 0) {
      $html = "";
      $html .= "<option selected>Seleccionar</option>";
      foreach ($datos as $row) {
        $html .= "<option value='" . $row["cat_id"] . "'>" . $row["cat_nom"] . "</option>";
      }
      echo $html;
    }
    break;
}
