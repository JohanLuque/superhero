<?php

require_once '../model/Conexion.php';

class SuperHero extends Conexion {
  private $conexion;

  //Constructor
  public function __CONSTRUCT(){
    $this->conexion = parent::getConexion();
  }

  public function listarSuperHero($publisher_id){
    try{
      $consulta = $this->conexion->prepare("CALL spu_superhero_list(?)");
      $consulta->execute(array($publisher_id));
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } 
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function buscar($race_id, $gender_id, $alignment_id){
    try{
      $consulta = $this->conexion->prepare("CALL spu_list(?,?,? )");
      $consulta->execute(array($race_id, $gender_id, $alignment_id));
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } 
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function grafico(){
    try{
      $consulta = $this->conexion->prepare("CALL spu_grafico()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function getGoodBad($publisher_id){
    try{
      $consulta = $this->conexion->prepare("CALL spu_buenos_malos(?)");
      $consulta->execute(array($publisher_id));
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function getColorEye(){
    try{
      $consulta = $this->conexion->prepare("CALL spu_colores_ojos()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }catch(Exception $e){
      die($e->getMessage());
    }
  }
  public function getGoobBadPublisher(){
    try{
      $consulta = $this->conexion->prepare("CALL spu_buenos_malos_id_especifico()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_NUM);
    }catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function getGenderXAlignment(){
    try{
      $consulta = $this->conexion->prepare("CALL spu_colores_ojos()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function getSuperheroTotal(){
    try{
      $consulta = $this->conexion->prepare("CALL spu_colores_ojos()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }catch(Exception $e){
      die($e->getMessage());
    }
  }

}