<?php
require_once '../model/Publisher.php';

if (isset($_POST["operacion"])){
  $publisher = new Publisher();
  
  if ($_POST["operacion"] == "listar") {
    $datosObtenidos = $publisher->listarPublisher();
    echo json_encode($datosObtenidos);
  }
}