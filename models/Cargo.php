<?php
class Cargo extends Conectar
{
  public function get_cargo()
  {
    /* TODO mostrar todas las categorias */
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "SELECT * FROM tm_cargo WHERE est = 1";
    $sql = $conectar->prepare($sql);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }
  /* TODO insertar categoria */
  public function insert_cargo($car_nom)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "INSERT INTO tm_cargo (car_id, car_nom, est) VALUE (NULL, ?, '1')";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $car_nom);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }
  /* TODO actualizar categoria */
  public function update_cargo($car_id, $car_nom)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "UPDATE tm_cargo SET
    car_nom = ?
    WHERE
    car_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $car_nom);
    $sql->bindValue(2, $car_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }
  /* TODO eliminar categoria */
  public function delete_cargo($car_id)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "UPDATE tm_cargo SET
    est = 0
    WHERE
    car_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $car_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }
  /* TODO mostrar un categoria en especifico */
  public function get_cargo_x_id($car_id)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "SELECT * FROM tm_cargo WHERE car_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $car_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }
}
