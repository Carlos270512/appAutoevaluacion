<?php

$conexion = new mysqli('localhost', 'desaroll_appUsuario', '=v=J7WL@V8zT', 'desaroll_appautoevaluacionbd');

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $id = $_POST['id'];
        $sql = "
                SELECT 
                    g.fecha AS fecha, 
                    g.carrera, 
                    l.usuario AS codigo_docente,
                    l.nombre AS nombre_docente,
                    coord.nombre AS nombre_coordinador,
                    c2.result2 AS res2, c2.resultado_final
                FROM coevaluacion_general g
                JOIN login l ON l.nombre = g.docente
                JOIN login coord ON coord.id = g.id_coordinador
                LEFT JOIN coevaluacion2 c2 ON g.id = c2.id_coevaluacion_general
                WHERE g.coevaluacion = 'GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES/ LABORATORIOS'
                AND g.id_coordinador = '".$id."' 
                GROUP BY g.fecha, g.carrera, l.usuario, l.nombre, coord.nombre, c2.result2, c2.resultado_final
                ORDER BY fecha DESC";


        $ejecutar = $conexion->query($sql);

if ($ejecutar->num_rows == 0) {
    // Redirigir de vuelta a la página con un mensaje
    echo '<center><script>alert("No existe Informacion")</script></center>';
    echo "<script>location.href='../../Coordinador/reporte_presencial/convertidor.php'</script>";
    exit; // Detener la ejecución si no hay registros
}

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Reporte_de_GESTION DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES/LABORATORIOS.xls");

?>
<table style="width: 60%; border-collapse: collapse; line-height: 100%;" cellpadding="0">
    <thead>
        <tr style="text-align: center;">
            <td colspan="7" style="font-weight: bold; font-size: 15px; text-align: center; vertical-align: middle; border: 1px solid black;">
                Evaluciones de Responsabilidad - GESTIÓN DE LOS RESPONSABLES DE MANTENIMIENTO DE TALLERES/ LABORATORIOS
            </td>
        </tr>
    </thead>
    <tbody>
        <tr class="head">
            <td style="font-weight: bold; font-size: 15px; text-align: center; vertical-align: middle; border: 1px solid black;">FECHA</td>
            <td style="font-weight: bold; font-size: 15px; text-align: center; vertical-align: middle; border: 1px solid black;">Evaluador</td>
            <td style="font-weight: bold; font-size: 15px; text-align: center; vertical-align: middle; border: 1px solid black;">CODIGO DOCENTE</td>
            <td style="font-weight: bold; font-size: 15px; text-align: center; vertical-align: middle; border: 1px solid black;">NOMBRE DOCENTE</td>
            <td style="font-weight: bold; font-size: 15px; text-align: center; vertical-align: middle; border: 1px solid black;">CARRERA</td>
            <td style="font-weight: bold; font-size: 15px; text-align: center; vertical-align: middle; border: 1px solid black;">PUNTAJE TOTAL</td>
            <td style="font-weight: bold; font-size: 15px; text-align: center; vertical-align: middle; border: 1px solid black;">PORCENTAJE TOTAL</td>
        </tr>
        <?php

        if (!$ejecutar) {
            die("Error en la consulta: " . $conexion->error);
        }

        while ($fila = mysqli_fetch_array($ejecutar)) {
        ?>
            <tr>
                <td style="border: 1px solid black; padding: 8px; font-size: 15px; text-align: center; vertical-align: middle;"><?php echo $fila['fecha'] ?></td>
                <td style="border: 1px solid black; padding: 8px; font-size: 15px; text-align: center; vertical-align: middle;"><?php echo $fila['nombre_coordinador'] ?></td>
                <td style="border: 1px solid black; padding: 8px; font-size: 15px; text-align: center; vertical-align: middle;"><?php echo $fila['codigo_docente'] ?></td>
                <td style="border: 1px solid black; padding: 8px; font-size: 15px; text-align: center; vertical-align: middle;"><?php echo $fila['nombre_docente'] ?></td>
                <td style="border: 1px solid black; padding: 8px; font-size: 15px; text-align: center; vertical-align: middle;"><?php echo $fila['carrera'] ?></td>
                <td style="border: 1px solid black; padding: 8px; font-size: 15px; text-align: center; vertical-align: middle;"><?php echo $fila['res2']?></td>
                <td style="border: 1px solid black; padding: 8px; font-size: 15px; text-align: center; vertical-align: middle;"><?php echo $fila['resultado_final'].' %'?></td>
            </tr>
        <?php
        }
        ?>

    </tbody>
</table>