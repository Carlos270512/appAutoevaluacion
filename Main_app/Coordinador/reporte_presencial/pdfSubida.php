<?php
// Conexión a la base de datos
include('conexion.php');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

session_start();
if (isset($_SESSION['usu'])) {
    if ($_SESSION['usu']['tipo'] != "Coordinador") {
        if ($_SESSION['usu']['tipo'] == "Administrador") {
            header('Location:../Administrador/');
        } else if ($_SESSION['usu']['tipo'] == "Docente") {
            header('Location:../Docente/');
        }
    }
} else {
    header('Location:../../');
}
$docente = $_SESSION['usu']['nombre'];
$tipo = $_SESSION['usu']['tipo'];
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../css3/iconos.css?v=1">
    <link rel="stylesheet" href="botones.css?v=4">
    <link rel="stylesheet" href="pdfs/subidaPdf.css?v=6">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../bod.css?v=1" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <title>Evaluacion de Responsabilidades</title>
</head>

<body>
    <header class="header">
        <nav class="nav container">
            <div class="nav__actions" style="margin-left: 2em;">
                <!-- Dropdown -->
                <div class="dropdown" id="dropdown">
                    <div class="dropdown__profile">
                        <div class="dropdown__names">
                            <h3><?php echo htmlspecialchars($docente); ?></h3>
                            <span><?php echo htmlspecialchars($tipo); ?></span>
                        </div>

                        <div class="dropdown__image">
                            <img src="../../image/logo_inicio.ico" alt="" />
                        </div>
                    </div>

                    <div class="dropdown__list">
                        <a href="../usuarios/cambiarclave.php" class="dropdown__link">
                            <i class="ph ph-user-circle"></i>
                            <span>Perfil de Usuario</span>
                        </a>

                        <a href="../cerrar.php" class="dropdown__link">
                            <i class="ph ph-sign-out"></i>
                            <span>Cerrar Sesion</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="nav__menu" id="nav-menu" style="position: absolute; margin-left: 23em;">
                <ul class="nav__list">
                    <li>
                        <i class="icon ph-bold ph-house-simple"></i>
                        <a href="../coordinador.php" class="nav__link">Inicio</a>
                    </li>

                    <li>
                        <div class="dropdown" id="dropdown">
                            <div class="dropdown__profile">
                                <div class="dropdown__names">
                                    <i class="icon ph-bold ph-table"></i>
                                    <a class="nav__link">Instrumentos</a>
                                </div>
                            </div>

                            <div class="dropdown__list" style="margin-left: -2em;">
                                <a href="../coevaluacion_presencial/index2.php" class="dropdown__link">
                                    <i class="ph ph-desktop"></i>
                                    <span>Formulario</span>
                                </a>
                            </div>
                        </div>
                    </li>

                    <?php if ($_SESSION['usu']['nombre'] === "GUAMAN FREIRE MARIO RUBEN") { ?>
                        <li>
                            <div class="dropdown" id="dropdown">
                                <div class="dropdown__profile">
                                    <div class="dropdown__names">
                                        <i class="ph ph-hard-drives"></i>
                                        <a href="../reporte_presencial/pdfSubida1.php" class="nav__link">Almacenamiento</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>


                    <?php if ($_SESSION['usu']['nombre'] === "GUAMAN FREIRE MARIO RUBEN") { ?>
                        <li>
                            <div class="dropdown" id="dropdown">
                                <div class="dropdown__profile">
                                    <div class="dropdown__names">
                                        <i class="icon ph-bold ph-files"></i>
                                        <a class="nav__link">Reportes</a>
                                    </div>
                                </div>

                                <div class="dropdown__list" style="margin-left: -2em;">
                                    <a href="../reporte_presencial/convertidor.php" class="dropdown__link">
                                        <i class="icon ph-bold ph-file"></i>
                                        <span>Reporte de Evaluación</span>
                                    </a>
                                    <a href="../reporte_presencial/somosTuvn1.php" class="dropdown__link">
                                        <i class="ph ph-download"></i>
                                        <span>Reportes SOMOS TUVN</span>
                                    </a>
                                    <a href="../reporte_presencial/somoTuvnCoor.php" class="dropdown__link">
                                        <i class="ph ph-eject-simple"></i>
                                        <span>Firmas SOMOS TUVN</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                    <?php } ?>

                    <?php if ($_SESSION['usu']['nombre'] != "GUAMAN FREIRE MARIO RUBEN") { ?>
                        <li>
                            <div class="dropdown" id="dropdown">
                                <div class="dropdown__profile">
                                    <div class="dropdown__names">
                                        <i class="icon ph-bold ph-files"></i>
                                        <a class="nav__link">Reportes</a>
                                    </div>
                                </div>

                                <div class="dropdown__list" style="margin-left: -2em;">
                                    <a href="../reporte_presencial/convertidor1.php" class="dropdown__link">
                                        <i class="icon ph-bold ph-file"></i>
                                        <span>Reporte General</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <i class="ph ph-upload"></i>
                            <a href="../reporte_presencial/somoTuvn.php" class="nav__link">Somos TUVN</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>


    <section>
        <div class="cont" style="width: 1535px; height: 350px;margin-top: 10em;">
            <div class="logo-title" style="color: black; font-size: 30px; display: flex; justify-content: center; margin-top: 40px;">
                <div class="icon"><i class="icon5 fa fa-files-o"></i></div><br>
                <h2><b style="color: black;">Almacenamiento de PDF's</b></h2>
            </div><br>

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdf'])) {
                $archivo = $_FILES['pdf'];
                $nombreArchivo = basename($archivo['name']);
                $rutaArchivo = "uploads/" . $nombreArchivo;

                // Validar que es un PDF
                if (pathinfo($nombreArchivo, PATHINFO_EXTENSION) !== 'pdf') {
                    echo "<p class='error'>Solo se permiten archivos PDF.</p>";
                } elseif (move_uploaded_file($archivo['tmp_name'], $rutaArchivo)) {
                    // Guardar en la base de datos
                    $stmt = $conexion->prepare("INSERT INTO pdfs (nombre, ruta) VALUES (?, ?)");
                    $stmt->bind_param("ss", $nombreArchivo, $rutaArchivo);

                    if ($stmt->execute()) {
                        echo '<center><script>alert("La información fue registrada exitosamente")</script></center>';
                        echo "<script>location.href='../../Coordinador/reporte_presencial/pdfSubida.php'</script>";
                    } else {
                        echo '<center><script>alert("Error al registrar el PDF.")</script></center>';
                        echo "<script>location.href='../../Coordinador/reporte_presencial/pdfSubida.php'</script>";
                    }
                } else {
                    echo '<center><script>alert("Error al registrar el PDF.")</script></center>';
                    echo "<script>location.href='../../Coordinador/reporte_presencial/pdfSubida.php'</script>";
                }
            }
            ?>

            <div class="container1" style="margin-top: 50px; width: 1000px; margin-left: 20em;">
                <form action="pdfSubida.php" method="post" enctype="multipart/form-data">
                    <label for="pdf" class="custom-file-upload">
                        <span id="nombreArchivo">Seleccionar archivo PDF</span>
                        <input type="file" id="pdf" name="pdf" accept=".pdf" required onchange="mostrarNombreArchivo()" style="display: none;">
                    </label><br><br>
                    <button type="submit">Subir</button>
                </form>
            </div>
        </div>
    </section>
    <script src="../assets/js/main.js"></script>
</body>

<script>
    function mostrarNombreArchivo() {
        const input = document.getElementById('pdf');
        const nombreArchivo = document.getElementById('nombreArchivo');
        nombreArchivo.textContent = input.files.length > 0 ? input.files[0].name : 'Seleccionar archivo PDF';
    }
</script>

</html>