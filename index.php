<?php

//INICIO DE SEISIÓN
session_start();

if (isset($_SESSION['usu'])) {
  $usuario = $_SESSION['usu'];
  if ($_SESSION['usu']['tipo'] == "Administrador") {
    header('Location:Main_app/Administrador/administrador.php');
  } elseif ($_SESSION['usu']['tipo'] == "Coordinador") {
    header('Location:Main_app/Coordinador/coordinador.php');
  } elseif (($_SESSION['usu']['tipo'] == "Docente")) {
    header('Location:Main_app/Docente/docente.php');
  } else {
    header('Location: index.php');
    die();
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Evaluación de Responsabilidades</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/main.js"></script>
  <style>
    body,
    html {
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      font-family: Arial, sans-serif;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: url('image/fondo.JPG') no-repeat center center/cover;
    }

    .container-form {
      border: 2px solid #270D07;
      background-color: rgba(31, 65, 121, 0.9);
      /* Fondo semitransparente */
      color: #ffffff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
      margin: 0 auto;
      overflow: hidden;
    }

    .header .logo-title {
      text-align: center;
      margin-bottom: 20px;
    }

    .header .icon {
      font-size: 40px;
      color: white;
      margin-bottom: 10px;
    }

    .error {
      display: none;
      text-align: center;
      color: red;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .welcome-form {
      text-align: center;
      margin-bottom: 20px;
    }

    .user,
    .password {
      margin-bottom: 15px;
      position: relative;
    }

    .icon2 {
      position: absolute;
      top: 50%;
      left: 10px;
      transform: translateY(-50%);
      color: #aaa;
    }

    input {
      width: 100%;
      box-sizing: border-box;
      padding: 10px 10px 10px 40px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #f2b440;
      color: #973614;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
    }

    button:hover {
      background-color: #ffd483;
    }

    .social-login {
      text-align: center;
      margin-top: 20px;
    }

    .social-login h3 {
      color: white;
      margin-bottom: 10px;
    }

    .social-icons a {
      color: white;
      font-size: 20px;
      margin: 0 10px;
      text-decoration: none;
    }

    #loader {
      display: none;
      justify-content: center;
      align-items: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
    }

    .spinner {
      border: 6px solid #f3f3f3;
      border-top: 6px solid #3498db;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    @media (max-width: 768px) {
      .container-form {
        width: 90%;
        max-width: 100%;
      }

      input {
        font-size: 12px;
      }

      button {
        font-size: 14px;
      }
    }
  </style>
</head>

<body>
  <div id="loader">
    <div class="spinner"></div>
  </div>

  <div class="container">
    <div class="container-form">
      <div class="header">
        <div class="logo-title">
          <div class="icon"><i class="fa fa-suitcase"></i></div>
          <h2><b>Evaluación de Responsabilidades</b></h2>
        </div>
      </div>

      <div class="error" id="error">
        <span>Datos Incorrectos</span>
      </div>

      <form action="" id="formLg" method="post" class="form">
        <div style="display: flex; justify-content: center; align-items: center; height: 20vh;">
          <img src="image/logo_inicio.ico" width="170" height="170" alt="Logo">
        </div>

        <div class="welcome-form">
          <h2><b>Bienvenido</b></h2>
          <h3>ISTVN</h3>
        </div>

        <div class="user line-input">
          <div class="icon2"><i class="fa fa-user"></i></div>
          <input type="text" name="usuariolg" placeholder="CÓDIGO DE USUARIO" required
            onkeypress="return soloLetras(event)"
            onkeyup="javascript:this.value=this.value.toUpperCase();">
        </div>

        <div class="password line-input">
          <div class="icon2"><i class="fa fa-lock"></i></div>
          <input type="password" name="passlg" placeholder="CONTRASEÑA" pattern="[A-Za-z0-9_-]{1,15}" required>
        </div>

        <button type="submit"><i class="icon3 fa fa-university"></i> Ingresar</button>
      </form>

      <div class="social-login">
        <div class="social-icons">
          <a href="https://www.instagram.com/tecnologicovidanueva/?fbclid=IwZXh0bgNhZW0CMTAAAR3j5ExSvqdfW6TOHswTGGgf7wqxKAXqGAKzb0zwgOqMK4uVajc4GYi2mak_aem__htzEmAjtRkfWHvirqN1ow" target="_blank" class="fab fa-instagram"></a>
          <a href="https://www.facebook.com/VidaNuevaITS/?locale=es_LA" class="fab fa-facebook" target="_blank"></a>
          <a href="https://vidanueva.edu.ec/?fbclid=IwZXh0bgNhZW0CMTAAAR1neU75tvVryi5oTkKfO2hvwRNL2txQ-g6ghodJOyDf238n8V3W0XlRNxA_aem_EosQmNNp3_m3FRkHBwl_wg" class="fas fa-globe" target="_blank"></a>
        </div>
      </div>
    </div>
  </div>

  <script>
    function soloLetras(e) {
      const key = e.keyCode || e.which;
      const tecla = String.fromCharCode(key).toLowerCase();
      const letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
      const especiales = [8, 37, 39, 46];

      if (!letras.includes(tecla) && !especiales.includes(key)) {
        return false;
      }
    }

    document.getElementById('formLg').addEventListener('submit', function(e) {
      e.preventDefault(); // Evita el envío inmediato del formulario
      const loader = document.getElementById('loader');
      loader.style.display = 'flex'; // Muestra el loader

      setTimeout(() => {
        loader.style.display = 'none'; // Oculta el loader después de 2 segundos
      }, 2000);
    });
  </script>
</body>

</html>