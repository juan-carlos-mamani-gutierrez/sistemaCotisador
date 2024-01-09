<?php
class Producto extends Conectar
{
  /* ------------------------------------- */
  /* TODO mostrar todas los clientes */
  /* ------------------------------------- */

  public function get_producto()
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "SELECT a.prod_id,b.cat_nom,a.prod_nom,a.prod_descrip,a.prod_precio 
    FROM tm_producto a INNER JOIN tm_categoria b ON a.cat_id = b.cat_id
    WHERE a.est = 1";
    $sql = $conectar->prepare($sql);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO insertar nuevo cliente */
  /* ------------------------------------- */

  public function insert_producto($cat_id, $prod_nom, $prod_descrip, $prod_precio)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = " INSERT INTO tm_producto (prod_id, cat_id, prod_nom, prod_descrip, prod_precio, est) VALUE (NULL, ?, ?, ?, ?, '1')";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $cat_id);
    $sql->bindValue(2, $prod_nom);
    $sql->bindValue(3, $prod_descrip);
    $sql->bindValue(4, $prod_precio);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO actualizar producto */
  /* ------------------------------------- */

  public function update_producto($prod_id, $cat_id, $prod_nom, $prod_descrip, $prod_precio)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "UPDATE tm_producto SET
    cat_id = ?,
    prod_nom = ?,
    prod_descrip = ?,
    prod_precio = ?
    WHERE
    prod_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $cat_id);
    $sql->bindValue(2, $prod_nom);
    $sql->bindValue(3, $prod_descrip);
    $sql->bindValue(4, $prod_precio);
    $sql->bindValue(5, $prod_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO eliminar producto */
  /* ------------------------------------- */

  public function delete_producto($prod_id)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "UPDATE tm_producto SET
    est = 0
    WHERE
    prod_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $prod_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO mostrar un producto en especifico */
  /* ------------------------------------- */

  public function get_producto_x_id($prod_id)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "SELECT * FROM tm_producto WHERE prod_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $prod_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }
}
