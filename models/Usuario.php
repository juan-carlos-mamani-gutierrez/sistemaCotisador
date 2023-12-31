<?php
class Usuario extends Conectar
{
  /* ------------------------------------- */
  /* TODO login usuario */
  /* ------------------------------------- */
  public function login()
  {
    $conectar = parent::Conexion();
    parent::set_names();
    if (isset($_POST["enviar"])) {
      $correo = $_POST["usu_correo"];
      $password = $_POST["usu_pass"];
      if (empty($correo) and empty($password)) {
        header("location:" . Conectar::ruta() . "index.php?m=2");
        exit();
      } else {
        $sql = "SELECT * FROM tm_usuario WHERE usu_correo = ? and usu_pass=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $correo);
        $sql->bindValue(2, $password);
        $sql->execute();
        $resultado = $sql->fetch();
        if (is_array($resultado) and count($resultado) > 0) {
          $_SESSION["usu_id"] = $resultado["usu_id"];
          $_SESSION["usu_nom"] = $resultado["usu_nom"];
          $_SESSION["usu_correo"] = $resultado["usu_correo"];
          header("location:" . Conectar::ruta() . "view/Home/");
          exit();
        } else {
          header("location:" . Conectar::ruta() . "index.php?m=1");
          exit();
        }
      }
    }
  }
  /* ------------------------------------- */
  /* TODO mostrar todas los usuario */
  /* ------------------------------------- */

  public function get_usuario()
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "SELECT * FROM tm_usuario WHERE est = 1";
    $sql = $conectar->prepare($sql);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO insertar nuevo usurio */
  /* ------------------------------------- */

  public function insert_usuario($usu_correo, $usu_nom, $usu_pass)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = " INSERT INTO tm_usuario (usu_id, usu_correo, usu_nom, usu_pass,  est) VALUE (NULL, ?, ?, ?, '1')";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $usu_correo);
    $sql->bindValue(2, $usu_nom);
    $sql->bindValue(3, $usu_pass);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO actualizar usuario */
  /* ------------------------------------- */

  public function update_usuario($usu_id, $usu_correo, $usu_nom, $usu_pass)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "UPDATE tm_usuario SET
    usu_correo = ?,
    usu_nom = ?,
    usu_pass = ?
    WHERE
    usu_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $usu_correo);
    $sql->bindValue(2, $usu_nom);
    $sql->bindValue(3, $usu_pass);
    $sql->bindValue(4, $usu_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO eliminar usuario */
  /* ------------------------------------- */

  public function delete_usuario($usu_id)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "UPDATE tm_usuario SET
    est = 0
    WHERE
    usu_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $usu_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  /* ------------------------------------- */
  /* TODO mostrar un usuario en especifico */
  /* ------------------------------------- */

  public function get_usuario_x_id($usu_id)
  {
    $conectar = parent::Conexion();
    parent::set_names();
    $sql = "SELECT * FROM tm_usuario WHERE usu_id = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $usu_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }
}
