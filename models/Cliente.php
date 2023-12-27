<?php
class Cliente extends Conectar
{
  /* ------------------------------------- */
  /* TODO mostrar todas los clientes */
  /* ------------------------------------- */

  public function get_cliente()
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "SELECT * FROM tm_cliente WHERE est = 1";
    $sql = $conectar->prepare($sql);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO insertar nuevo cliente */
  /* ------------------------------------- */

  public function insert_cliente($cli_nom, $cli_ruc, $cli_telf, $cli_email)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = " INSERT INTO tm_cliente (cli_id, cli_nom, cli_ruc, cli_telf, cli_email, est) VALUE (NULL, ?, ?, ?, ?, '1')";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $cli_nom);
    $sql->bindValue(2, $cli_ruc);
    $sql->bindValue(3, $cli_telf);
    $sql->bindValue(4, $cli_email);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO actualizar cliente */
  /* ------------------------------------- */

  public function update_cliente($cli_id, $cli_nom, $cli_ruc, $cli_telf, $cli_email)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "UPDATE tm_cliente SET
    cli_nom = ?,
    cli_ruc = ?,
    cli_telf = ?,
    cli_email = ?
    WHERE
    cli_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $cli_nom);
    $sql->bindValue(2, $cli_ruc);
    $sql->bindValue(3, $cli_telf);
    $sql->bindValue(4, $cli_email);
    $sql->bindValue(5, $cli_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO eliminar cliente */
  /* ------------------------------------- */

  public function delete_cliente($cli_id)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "UPDATE tm_cliente SET
    est = 0
    WHERE
    cli_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $cli_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO mostrar un cliente en especifico */
  /* ------------------------------------- */

  public function get_cliente_x_id($cli_id)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "SELECT * FROM tm_cliente WHERE cli_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $cli_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }
}
