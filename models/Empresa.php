<?php

class Empresa extends Conectar
{
  /* ------------------------------------- */
  /* TODO mostrar todas los empresa */
  /* ------------------------------------- */

  public function get_empresa()
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "SELECT * FROM tm_empresa";
    $sql = $conectar->prepare($sql);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO insertar nuevo empresa */
  /* ------------------------------------- */

  public function insert_empresa($emp_nom, $emp_porcen)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = " INSERT INTO tm_empresa (emp_id, emp_nom, emp_porcen) VALUE (NULL, ?, ?)";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $emp_nom);
    $sql->bindValue(2, $emp_porcen);

    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO actualizar empresa */
  /* ------------------------------------- */

  public function update_empresa($emp_id, $emp_nom, $emp_porcen)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "UPDATE tm_empresa SET
    emp_nom = ?,
    emp_porcen = ?
    WHERE
    emp_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $emp_nom);
    $sql->bindValue(2, $emp_porcen);
    $sql->bindValue(3, $emp_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO eliminar empresa */
  /* ------------------------------------- */

  public function delete_empresa($emp_id)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "DELETE FROM tm_empresa
    WHERE
    emp_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $emp_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO mostrar un empresa en especifico */
  /* ------------------------------------- */

  public function get_empresa_x_id($emp_id)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "SELECT * FROM tm_empresa WHERE emp_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $emp_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }
}
