<?php
class Contacto extends Conectar
{
  /* ------------------------------------- */
  /* TODO mostrar todas los contacto */
  /* ------------------------------------- */

  public function get_contacto()
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "SELECT * FROM tm_contacto WHERE est = 1";
    $sql = $conectar->prepare($sql);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO insertar nuevo contacto */
  /* ------------------------------------- */

  public function insert_contacto($cli_id, $car_id, $con_nom, $con_email, $con_telf)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = " INSERT INTO tm_contacto (con_id, cli_id, car_id, con_nom, con_email, con_telf, est) VALUE (NULL, ?, ?, ?, ?, ?, '1')";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $cli_id);
    $sql->bindValue(2, $car_id);
    $sql->bindValue(3, $con_nom);
    $sql->bindValue(4, $con_email);
    $sql->bindValue(5, $con_telf);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO actualizar contacto */
  /* ------------------------------------- */

  public function update_contacto($con_id, $cli_id, $car_id, $con_nom, $con_email, $con_telf)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "UPDATE tm_contacto SET
    cli_id = ?,
    car_id = ?,
    con_nom = ?,
    con_email = ?,
    con_telf = ?
    WHERE
    con_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $cli_id);
    $sql->bindValue(2, $car_id);
    $sql->bindValue(3, $con_nom);
    $sql->bindValue(4, $con_email);
    $sql->bindValue(5, $con_telf);
    $sql->bindValue(6, $con_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO eliminar contacto */
  /* ------------------------------------- */

  public function delete_contacto($con_id)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "UPDATE tm_contacto SET
    est = 0
    WHERE
    con_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $con_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO mostrar un contacto en especifico */
  /* ------------------------------------- */

  public function get_contacto_x_id($con_id)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "SELECT * FROM tm_contacto WHERE con_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $con_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }
}
