<?php
class Categoria extends Conectar
{
  public function get_categoria()
  {
    /* TODO mostrar todas las categorias */
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "SELECT * FROM tm_categoria WHERE est = 1;";
    $sql = $conectar->prepare($sql);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }
  /* TODO insertar categoria */
  public function insert_categoria($cat_nom, $cat_descrip)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = " INSERT INTO tm_categoria (cat_id, cat_nom, cat_descrip, est) VALUE (NULL, ?, ?,'1');";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $cat_nom);
    $sql->bindValue(2, $cat_descrip);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }
  /* TODO actualizar categoria */
  public function update_categoria($cat_id, $cat_nom, $cat_descrip)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "UPDATE tm_categoria SET
    cat_nom = ?,
    cat_descrip = ?,
    WHERE
    cat_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $cat_id);
    $sql->bindValue(2, $cat_descrip);
    $sql->bindValue(3, $cat_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }
  /* TODO eliminar categoria */
  public function delete_categoria($cat_id)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "UPDATE tm_categoria SET
    est = 0
    WHERE
    cat_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $cat_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }
  /* TODO mostrar un categoria en especifico */
  public function get_categoria_x_id($cat_id)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "SELECT * FROM tm_categoria WHERE cat_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $cat_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }
}
