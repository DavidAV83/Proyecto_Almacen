<?php
ini_set('memory_limit', '256M');
session_start();

// Activar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "Terry231", "metro_azteca");
$conexion->set_charset("utf8");

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

// Obtener todos los registros de la tabla histor
$sql = "SELECT * FROM histor";
$result = $conexion->query($sql);

if ($result && $result->num_rows > 0) {
    $datos = $result->fetch_all(MYSQLI_ASSOC);

    // Configuración del archivo CSV
    $filename = "existencia_general_" . date('Ymd') . ".csv";
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=' . $filename);

    $output = fopen('php://output', 'w');

    // Encabezados del CSV
    fputcsv($output, array_keys($datos[0]));

    // Datos
    foreach ($datos as $row) {
        fputcsv($output, $row);
    }

    fclose($output);
    exit();
} else {
    echo "No se encontraron registros en la tabla histor.";
}

$conexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../inc/head.php";?>
    <link rel="stylesheet" href="../css/estilo_consultas.css">
</head>
<body>
    <div class="barra">
        <h1>EXISTENCIA GENERAL</h1>
    </div>
    <div class="cerrar">
        <form method="post" action="../path/to/descargar_csv.php">
            <button type="submit" name="csv">
                <img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar">
                DESCARGA CSV
            </button>
        </form>
    </div>
    <div class="regresar">
        <button name="regresar" onclick="window.history.back();">
            <img src="../img/regresar.png" alt="regresar" id="regresar">
        </button>
    </div>
</body>
</html>
