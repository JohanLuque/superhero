<?php
require_once '../model/Alignment.php';
require_once '../model/Gender.php';
require_once '../model/Race.php';

function renderJSON($object = []){
  if($object){
    echo json_encode($object);
  }
}

if(isset($_POST['operacion'])){
  switch($_POST['operacion']){
    case 'listarBandos':
      $alignment = new Alignment();
      renderJSON($alignment->listarAlignment());
      break;
    case 'listarRazas':
      $race = new Race();
      renderJSON($race->listarRace());
      break;
    case 'listarGeneros':
      $gender = new Gender();
      renderJSON($gender->listarGender());
      break;
  }
}