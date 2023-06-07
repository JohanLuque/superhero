<?php
require_once '../model/SuperHero.php';

function renderJSON($object = []){
  if($object){
    echo json_encode($object);
  }
}

if (isset($_POST["operacion"])){
  $superhero = new SuperHero();
  
  if ($_POST["operacion"] == "listar") {
    renderJSON($superhero->listarSuperHero($_POST['publisher_id']));
  }
  
  if ($_POST["operacion"] == "buscar") {
    $filtros =[
      "race_id"   => $_POST['race_id'],
      "gender_id"   => $_POST['gender_id'],
      "alignment_id"   => $_POST['alignment_id']
    ];
    renderJSON($superhero->buscar($filtros));
  }

  if ($_POST["operacion"] == "grafico") {
    $datos = $superhero->grafico();
    renderJSON($datos);
  }

  if ($_POST["operacion"] == "resumenBuenosMalos") {
    $datos = $superhero->getGoodBad($_POST['publisher_id']);
    renderJSON($datos);
  }

  if ($_POST["operacion"] == "resumenColorOjos") {
    $datos = $superhero->getColorEye();
    renderJSON($datos);
  }

  if ($_POST["operacion"] == "resumenBuenosMalosPublicadora") {
    $datos = $superhero->getGoobBadPublisher();
    renderJSON($datos);
  }

  if ($_POST["operacion"] == "resumenGeneros") {
    $datos = $superhero->getGenderXAlignment();
    renderJSON($datos);
  }

  if ($_POST["operacion"] == "resumenTotalSuperheros") {
    $datos = $superhero->getSuperheroTotal();
    renderJSON($datos);
  }
}