<?php

require_once '../model/Conexion.php';

class Gender extends Conexion {
  private $conexion;

  //Constructor
  public function __CONSTRUCT(){
    $this->conexion = parent::getConexion();
  }

  public function listarGender(){
    try{
      $consulta = $this->conexion->prepare("SELECT * FROM gender");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_NUM);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}