<?php
require('conexion.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="js/jquery-1.9.1.min.js"></script>
</head>
<body>
	<script>
$(document).ready(function() {
    $("#resultadoBusqueda").html('');
});

function buscar() {
    var textoBusqueda = $("input#busqueda").val();
 
     if (textoBusqueda != "") {
        $.post("buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusqueda").html(mensaje);
         }); 
     } else { 
        $("#resultadoBusqueda").html('');
        };
};
</script>
<form accept-charset="utf-8" method="POST">
<input type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();buscar();"   />
</form>
<div id="resultadoBusqueda"></div>
</body>
</html>