<?php
require_once '../model/Race.php';

if (isset($_POST["operacion"])){
  $race = new Race();
  
  if ($_POST["operacion"] == "listar") {
    $datos = $race->listarRaces();
      echo json_encode($datos);
  }
}