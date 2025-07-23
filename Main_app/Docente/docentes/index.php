<?php
	
	session_start();
if(isset($_SESSION['usu'])){
if($_SESSION['usu']['tipo'] != "Admin"){ 
header('Location:../Usuario/');
  }
} else {
	 header('Location: ../../../');//Aqui lo redireccionas al lugar que quieras.
}
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT * FROM docentes ORDER BY docente ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT * FROM docentes WHERE docente LIKE :campo OR docente LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<html>
<title>Docentes Registrados</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="../../image/logo_inicio.ico" />


<link rel="stylesheet" href="../css3/iconos.css?v=1">
<link rel="stylesheet" href="../diseño.css?v=2">
<link rel="stylesheet" href="../css3/main.css?v=3">
<link rel="stylesheet" href="../css3/style.css?v=4">

<link rel="stylesheet" href="css/estilo.css?v=5">
  
 <style>

        #headerr {
        width: 100%;
        height: 68px;
        padding: 2px;
        background-color: #99421b;
        font-family:Arial, Helvetica, sans-serif;
        position: fixed;
        top: 0;
        left: 60px;
        z-index: 2;
      }
      
      ul, ol {
        list-style:none;
      }
      
      .nav > li {
        float:left;
      }

      body{
            background-image: url(image/fondo.jpg);
        }
        
        .welcome{
            width: 100%;
            max-width: 600px;
            margin: auto;
            margin-top: 100px;
            background: rgba(0,0,0,0.6);
            text-align: center;
            padding: 20px;
        }
        
        .welcome img{
            width: 120px;
            height: 120px;
            text-align: center;
        }

        .welcome h1{
            font-size: 50px;
            color: white;
            font-weight: 100;
            margin-top: 20px;
        }
        
        .welcome a{
            display: block;
            margin-top: 40px;
            font-size: 20px;
            padding: 10px;
            border: 1px solid white;
        }
                .welcome a:hover{
            color: black;
            background: white;
        }
        


.caja{
  color: black;
  font-size: 15px;
  vertical-align: middle;
  width: 275px;
  height: 32px;
  border-radius: 5px;
  border:solid 1px #212127;
  margin-left: 10px;
  margin-bottom: 20px;
}

        
.contenedor .icon{
  color: white;
  margin-top: 12px;
  font-size: 25px;
  vertical-align: middle;
}

.container-form .form .user .icon2{
  color: #4A220C;
  font-size: 25px;
  vertical-align: middle;
}

.container-form .form .password .icon2{
  color: #4A220C;
  font-size: 25px;
  vertical-align: middle;
}

.contenedor .user{
  color: black;
  font-size: 15px;
  vertical-align: middle;
  width: 275px;
  height: 32px;
  border-radius: 5px;
  border:solid 1px #212127;
  margin-left: 15px;
  margin-right: 15px;
  margin-top: 20px;
  margin-bottom: 50px;
}

.container-form .form .password input{
 color: black;
  font-size: 15px;
  vertical-align: middle;
  width: 275px;
  height: 32px;
  border-radius: 5px;
  border:solid 1px #212127;
  margin-left: 15px;
}

table .tabla {
	background-color:#EEE1D3;
}	

table tr td{
    border:1px solid gray;
}
	
body{
    background-image: url(fondo.jpg);
    background-position: center;
    background-attachment: fixed;
    background-size: cover;
}

.btn{
    width: 120px;
    height: 40px;
    display: block;
    margin: auto;
    margin-top: 30px;
    color: white;
    background: #4A220C;
    border-style: none;
    outline: 0px;
    border-radius: 15px;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
}

.btn:hover{
    background-color: #7E4D31;
    color: white;
}

</style>

<header>
<div>
<div id="headerr">
      <ul class="nav">
       
        <li><img src="http://www.istvidanueva.edu.ec/wp-content/uploads/2016/12/logo_inicio.png" width="65" height="65" style="margin-left: 10px" /></li>
        <li><h4 style="color: white; font-size: 20px; margin-top: 20px; margin-left: 10px"><b>Coevaluación Tecnológico Vida Nueva</b></h4></li>
     </ul>
</div>
</header>
   
   
 <body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  

  <div id="inicio_admin" class="menu-collapsed">
       <div id="header">
        
            <div id=menu-btn>
                <div class="btn-inicio"></div>
              <div class="btn-inicio"></div>
              <div class="btn-inicio"></div>
            </div>
          
       </div>

       <div id="profile">
            <div id="photo"><img src="../image/usuario.png"/></div>
            <div id="name"><span><b>Bienvenido:</b> <br><div style="margin-top: 13px"><h4 style="color: white; font-size: 16px"><b><span class="fa fa-user icon-menu" style="margin-right: 5px"></span><?php echo $_SESSION['usu']['usuario'] ?></b></h4></span></div></div>
       </div>

    <div id="menu-items">
    <div class="item">
    <ul>
            <li><a href="../admin.php">
                <div class="icon"><i class="fa fa-home"></i></div> 
                <div class="title"><b>Inicio</b></div>
                </a>
            </li>
      
        <div class="item separator">
        </div>

            <li><a href="javascript:void();">
                <div class="icon"><i class="fa fa-edit"></i></div>
                <div class="title"><b>Editar</b></div>
                <div class="icon"><i style="font-size: 12px;" class="fa fa-chevron-down"></i></div></a>
            <ul>
                <li><a href="javascript:void();">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="title">Usuarios</div>
                    <div class="icon"><i style="font-size: 12px" class="fa fa-chevron-down"></i></div></a>
                    <ul>
                      <li><a href="../register.php">
                            <div class="icon"><i class="fa fa-file-o"></i></div>
                            <div class="title">Formulario de Registro</div>
                        </a></li>
                      <li><a href="../usuarios/index.php">
                            <div class="icon"><i class="fa fa-search"></i></div>
                            <div class="title">Usuarios Registrados</div>
                        </a></li>
                        
                        
                    </ul>
                </li>
                <li><a href="javascript:void();">
                <div class="icon"><i class="fa fa-graduation-cap"></i></div>
                <div class="title">Docentes</div>
                  <div class="icon"><i style="font-size: 12px" class="fa fa-chevron-down"></i></div></a>
                    <ul>
                  <li><a href="../register2.php">
                    <div class="icon"><i class="fa fa-file-o"></i></div>
                    <div class="title">Formulario de Registro</div>
                  </a></li>
                      
                </ul>
              </li>
                <!--<li><a href="javascript:void();">
                    <div class="icon"><i class="fa fa-suitcase"></i></div>
                    <div class="title">Coevaluación</div>
                    <div class="icon"><i style="font-size: 12px" class="fa fa-chevron-down"></i></div></a>
                    <ul>
                        <li><a href="../modificar_eliminar/index_1.php">
                        <div class="icon"><i class="fa fa-institution"></i></div>
                        <div class="title">Presencial</div>
                        </a></li>
                        <li><a href="../modificar_eliminar/index.php">
                        <div class="icon"><i class="fa fa-institution"></i></div>
                        <div class="title">Semipresencial</div>
                        </a></li>
                    </ul>
                </li>-->
            </ul>
            </li>

        <div class="item separator">
        </div>

            <li><a href="javascript:void();">
                <div class="icon"><i class="fa fa-suitcase icon-menu"></i></div>
                <div class="title"><b>Coevaluación</b></div>
                <div class="icon"><i style="font-size: 12px" class="fa fa-chevron-down"></i></div></a>
                <ul>
                <li><a href="javascript:void();">
                    <div class="icon"><i class="fa fa-desktop"></i></div>
                    <div class="title">Aula</div>
                    <div class="icon"><i style="font-size: 12px" class="fa fa-chevron-down"></i></div></a>
                    <ul>
                       <li><a href="../coevaluacion_presencial/index2.php">
                       <div class="icon"><i class="fa fa-institution"></i></div>
                       <div class="title">Presencial</div>
                       </a></li>
                       <li><a href="../coevaluacion_semipresencial/index3.php">
                       <div class="icon"><i class="fa fa-institution"></i></div>
                       <div class="title">Semipresencial</div>
                       </a></li>
                    </ul>
                </li>
                <li><a href="javascript:void();">
                    <div class="icon"><i class="fa fa-industry"></i></div>
                    <div class="title">Taller</div>
                    <div class="icon"><i style="font-size: 12px" class="fa fa-chevron-down"></i></div></a>
                    <ul>
                        <li><a href="../coevaluacion_presencial_taller/index2.php">
                        <div class="icon"><i class="fa fa-institution"></i></div>
                        <div class="title">Presencial</div>
                      </a></li>
                  <li><a href="../coevaluacion_semipresencial_taller/index3.php">
                  <div class="icon"><i class="fa fa-institution"></i></div>
                  <div class="title">Semipresencial</div>
                  </a></li>                 
                    </ul>
                </li>
            </ul>
            </li>

        <div class="item separator">
        </div>

            <li><a href="javascript:void();">
            <div class="icon"><i class="fa fa-file-o"></i></div>
            <div class="title"><b>Reportes</b></div>
            <div class="icon"><i style="font-size: 12px" class="fa fa-chevron-down"></i></div></a>
              <ul>
              <li><a href="../reporte_presencial/convertidor.php">
              <div class="icon"><i class="fa fa-institution"></i></div>
              <div class="title">Presencial</div>
                </a></li>
                  <li><a href="../reporte_semipresencial/convertidor.php">
                  <div class="icon"><i class="fa fa-institution"></i></div>
                  <div class="title">Semipresencial</div>
                  </a></li>
            </ul>
        </li>
       
        <div class="item separator">
        </div>

        <li><a href="../cerrar.php">
            <div class="icon"><i class="fa fa-close"></i></div>
            <div class="title"><b>Salir</b></div>
        </a></li>
    </ul>
    </div>
    </div>
  </div>
<script>
        const btn = document.querySelector('#menu-btn');
        const menu = document.querySelector('#inicio_admin');
        btn.addEventListener('click', e =>{
            menu.classList.toggle("menu-expanded");
            menu.classList.toggle("menu-collapsed");

            document.querySelector('body').classList.toggle('body-expanded');
        });
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $('.item > ul > li:has(ul)').addClass('desplegable');
   $('.item > ul > li > a').click(function() {
     var comprobar = $(this).next();
     $('.item li').removeClass('active');
     $(this).closest('li').addClass('active');
     if((comprobar.is('ul')) && (comprobar.is(':visible'))) {
        $(this).closest('li').removeClass('active');
        comprobar.slideUp('normal');
     }
     if((comprobar.is('ul')) && (!comprobar.is(':visible'))) {
        $('.item ul ul:visible').slideUp('normal');
        comprobar.slideDown('normal');
     }
  });
  $('.item > ul > li > ul > li:has(ul)').addClass('desplegable');
   $('.item > ul > li > ul > li > a').click(function() {
     var comprobar = $(this).next();
     $('.item ul ul li').removeClass('active');
     $(this).closest('ul ul li').addClass('active');
     if((comprobar.is('ul ul')) && (comprobar.is(':visible'))) {
        $(this).closest('ul ul li').removeClass('active');
        comprobar.slideUp('normal');
     }
     if((comprobar.is('ul ul')) && (!comprobar.is(':visible'))) {
        $('.item ul ul ul:visible').slideUp('normal');
        comprobar.slideDown('normal');
     }
  });
});
</script>
<script language="javascript">
        function doSearch()
        {
            const tableReg = document.getElementById('datos');
            const searchText = document.getElementById('searchTerm').value.toLowerCase();
            let total = 0;
 
            // Recorremos todas las filas con contenido de la tabla
            for (let i = 1; i < tableReg.rows.length; i++) {
                // Si el td tiene la clase "noSearch" no se busca en su cntenido
                if (tableReg.rows[i].classList.contains("noSearch")) {
                    continue;
                }
 
                let found = false;
                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                // Recorremos todas las celdas
                for (let j = 0; j < cellsOfRow.length && !found; j++) {
                    const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                    // Buscamos el texto en el contenido de la celda
                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                        found = true;
                        total++;
                    }
                }
                if (found) {
                    tableReg.rows[i].style.display = '';
                } else {
                    // si no ha encontrado ninguna coincidencia, esconde la
                    // fila de la tabla
                    tableReg.rows[i].style.display = 'none';
                }
            }
 
            // mostramos las coincidencias
            const lastTR=tableReg.rows[tableReg.rows.length-1];
            const td=lastTR.querySelector("td");
            lastTR.classList.remove("hide", "red");
            if (searchText == "") {
                lastTR.classList.add("hide");
                td.innerHTML="";
            } else if (total) {
                td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");
            } else {
                lastTR.classList.add("red");
                td.innerHTML="No se han encontrado coincidencias";
            }
        }
    </script>
    <script type="text/javascript">
    function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}
  </script>
<section>
	<div class="contenedor">
		<div class="logo-title" style="margin-top: 60px">
                <div class="icon"><i class="fa fa-graduation-cap"></i></div>
                <h2 style="color: white; font-size: 30px;"><b>Docentes Registrados</b> </h2>
            </div>

<style type="text/css">
      .contenedor .user{
  color: black;
  font-size: 15px;
  vertical-align: middle;
  width: 350px;
  height: 32px;
  border-radius: 5px;
  border:solid 1px #212127;
  margin-left: 15px;
  margin-right: 15px;
  margin-top: 20px;
  margin-bottom: 50px;
}
    </style>
    <form action="" class="formulario" method="post">
        <div class="icon" style="margin-left: 10px; margin-top: 20px";><i class="fa fa-search"></i></div>
        <input id="searchTerm" type="text" placeholder="Apellidos y Nombres" class="user" onkeyup="doSearch()" onkeypress="return soloLetras(event)">
      </form>

    
		
			<!--<form action="" class="formulario" method="post">
				<div class="icon" style="margin-left: 10px; margin-top: 20px";><i class="fa fa-search"></i></div>
				<input type="text" name="buscar" placeholder="Nombre de Usuario" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="user">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
			</form>-->
		<style type="text/css">
            i{
            color: white;
            font-size: 15px;
            vertical-align: middle;
            }
      </style>
		<table id="datos">
		<thead class="tabla">
			<tr class="head">
				
				<td>Código</td>
        <td>Docente</td>
				<td colspan="2">Opciones</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td style="width: 100px"><?php echo $fila['codigo']; ?></td>
					<td><?php echo $fila['docente']; ?></td>					
					<td style="width: 110px"><div align="center"><a href="update.php?id=<?php echo $fila['id']; ?>"  class="btn__update"><i class="icon3 fa fa-edit"></i> Editar</a></div>
					</td>
					<td style="width: 110px"><div align="center">
						<a href="delete.php?id=<?php echo $fila['id']; ?>"onclick="return confirmation()"   class="btn__delete"><i class="icon3 fa fa-trash-o"></i> Eliminar</a></div>
					</td>
				</tr>
			<?php endforeach ?>
		</thead>
    <tr class='noSearch hide'>
          <td colspan="4" height="34px"></td>
      </tr>
		</table>
	</div>
</section>
<script type="text/javascript">
<!--
function confirmation() {
    if(!confirm("¿Realmente desea eliminar este registro?")) return false;    
}
//-->
</script>
</body>
</html>