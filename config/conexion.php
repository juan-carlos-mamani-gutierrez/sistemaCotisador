<?php
/* TODO iniciar o reanudar una sesion de php */
session_start();

class Conectar
{
  protected $dbh;
  /* TODO funcion para realizar la conexion */
  protected function Conexion()
  {
    try {

      $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=cotizador", "root", "");
      return $conectar;
    } catch (Exception $e) {

      print "!Error DB : " . $e->getMessage() . "<br/>";
      die();
    }
  }
  /* TODO funcion para configurar la codificacion de caracteres */
  public function set_names()
  {

    return $this->dbh->query("SET NAMES 'utf8'");
  }
  /* TODO funcion para obtener la ruta de aplicacion */
  public  static function ruta()
  {

    return "http://localhost/cotizador";
  }
}
