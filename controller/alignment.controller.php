<?php
require_once '../model/Alignment.php';

if (isset($_POST["operacion"])){
  $alignment = new Alignment();
  
  if ($_POST["operacion"] == "listar") {
    $datos = $alignment->listarAlignment();
    echo json_encode($datos);
  }
}