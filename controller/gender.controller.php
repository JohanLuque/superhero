<?php
require_once '../model/Gender.php';

if (isset($_POST["operacion"])){
  $gender = new Gender();
  
  if ($_POST["operacion"] == "listar") {
    $datos = $gender->listarGender();
      echo json_encode($datos);
  }
}