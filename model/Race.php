<?php

require_once '../model/Conexion.php';

class Race extends Conexion {
  private $conexion;

  //Constructor
  public function __CONSTRUCT(){
    $this->conexion = parent::getConexion();
  }

  public function listarRaces(){
    try{
      $consulta = $this->conexion->prepare("SELECT * FROM race");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}