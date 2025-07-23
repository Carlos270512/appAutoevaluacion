<?php
 
$config = parse_ini_file('config.ini'); 

$conexion = mysqli_connect('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');
 
if($conexion === false) { 
 echo 'Ha habido un error <br>'.mysqli_connect_error(); 
} 
?>