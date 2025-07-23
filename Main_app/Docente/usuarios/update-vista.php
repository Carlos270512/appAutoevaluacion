<?php

session_start();
if(isset($_SESSION['usu'])){
if($_SESSION['usu']['tipo'] != "Usuario"){ 
header('Location:../Admin/');
  }
} else {
  header('Location:../../');
}
?>

<html>
<title>Formulario de Actualización de Datos</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="../../image/logo_inicio.ico" />
<link rel="stylesheet" href="../css3/iconos.css">
<link rel="stylesheet" href="../diseño.css">   
<link rel="stylesheet" href="../css3/main.css">
<link rel="stylesheet" href="../css3/style.css">

<link rel="stylesheet" href="css/estilo.css">
  
 <style>

        #headerr {
        width: 100%;
        padding: 2px;
        height: 68px;
        background-color: #4A220C;
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

        
.container-form .header .logo-title .icon{
  color: white;
  margin-top: 8px;
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

.container-form .form .user input{
  color: black;
  font-size: 15px;
  vertical-align: middle;
  width: 275px;
  height: 32px;
  border-radius: 5px;
  border:solid 1px #212127;
  margin-left: 15px;
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
  background-color:white;
} 
  
body{
    background-image: url(fondo.jpg);
    background-position: center;
    background-attachment: fixed;
    background-size: cover;
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
            <li><a href="../usuario.php">
                <div class="icon"><i class="fa fa-home"></i></div> 
                <div class="title"><b>Inicio</b></div>
                </a>
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
<section>
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
  <div align="center">
    <div class="container-form">
   <div class="header">
        <div class="logo-title">
          <style type="text/css">
            .icon4{
            color: white;
            font-size: 20px;
            vertical-align: middle;
            margin-left: 60px;

          }
        </style>
                <div class="icon"><i class="fa fa-edit"></i></div>
                <h2 style="color: white; font-size: 20px; margin-top: 10px;"><b>Formulario de Actualización de Datos</b> </h2>
            </div>
        </div>
  
    <form action="" method="post" class="form">
    <?php
    if(isset($_POST['guardar'])){
      require "conexion.php";

      $passActual=$mysqli->real_escape_string($_POST['passActual']);
      $passNueva=$mysqli->real_escape_string($_POST['passNueva']);
      $passConfir=$mysqli->real_escape_string($_POST['passConfir']);
      /*$passActual=md5($passActual);
      $passNueva=md5($passNueva);
      $passConfir=md5($passConfir);*/
      $error = '';

      $sqlA= $mysqli->query("SELECT clave FROM login WHERE usuario ='".$_SESSION['usu']['usuario']."'");
      $rowA=$sqlA->fetch_array();

      if($rowA['clave'] == $passActual){
            if($passNueva==$passConfir){
              $update=$mysqli->query("UPDATE login SET clave='$passNueva' WHERE usuario ='".$_SESSION['usu']['usuario']."'");
              if($update){
                $error .= '<h4 style="color: green;"><b>✓ Contraseña actualizada exitosamente</b></h4>';
              }
            }else{
              $error .= '<h4><b>X Las contraseñas no coinciden</b></h4>';
            }
      }else{
        $error .= '<h4><b>X Su contraseña actual es incorrecta</b></h4>';
      }

    }
    ?>

      <div class="user line-input">
                <div class="icon2"><i class="fa fa-user"></i></div>
              
                <input type="text" name="usuario" value="<?php echo $_SESSION['usu']['usuario'] ?>" required=""
                 readonly="">
            </div>
            <div class="password line-input">
                <div class="icon2"><i class="fa fa-lock"></i></div>
            
                <input type="password" name="passActual" placeholder="Contraseña Actual" required="">
            </div>

            <div class="password line-input">
                <div class="icon2"><i class="fa fa-lock"></i></div>
            
                <input type="password" name="passNueva" placeholder="Nueva Contraseña" required="" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" title="La contraseña debe empezar con una letra y contener al menos un dígito" minlength="5">
            </div>
            <div class="password line-input">
                <div class="icon2"><i class="fa fa-lock"></i></div>
            
                <input type="password" name="passConfir" placeholder="Confirmar Contraseña" required="">
            </div>
            <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
           
            <style type="text/css">
            .icon3{
            color: white;
            font-size: 15px;
            vertical-align: middle;
          }
      </style>
        <button style="display: inline-block;" type="submit" name="guardar" value="Guardar"><i class="icon3 fa fa-save"></i> Guardar</button>

    </form>
    
</div>
</div>
</div>
</section>
</body>
</html>
