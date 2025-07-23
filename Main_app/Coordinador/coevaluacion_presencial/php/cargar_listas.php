<?php 
require_once 'conexion.php';

function getListasRep(){
  $mysqli = getConn();
  $query = 'SELECT * FROM `tipo_carrera`';
  $result = $mysqli->query($query);
  $listas = '<option value="">ELIGE UNA OPCIÓN</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[id]'>$row[nombre]</option>";
  }
  return $listas;
}

echo getListasRep();