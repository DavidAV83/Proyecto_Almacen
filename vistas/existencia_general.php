<?php
ini_set('memory_limit', '3G');

session_start();

// Procesar la solicitud de cerrar sesión
if (isset($_POST['cerrar_sesion'])) {
    // Destruir la sesión
    session_destroy();
    
    // Establecer las cabeceras HTTP para evitar la caché
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Pragma: no-cache');
    
    // Redirigir a index.php
    header('Location: ../index.php');
    exit;
}

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "Terry231", "metro_azteca");
$conexion->set_charset("utf8");

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

// Obtener todos los datos de la tabla histor para la descarga de CSV
$sql = "SELECT * FROM histor";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $datos = $result->fetch_all(MYSQLI_ASSOC);
    
    // Guardar los datos en la sesión para la descarga de CSV
    $_SESSION['csv_data'] = $datos;
} else {
    echo "No se encontraron registros en la tabla 'histor'.";
}

// Procesar la solicitud de descarga de CSV
if (isset($_POST['csv'])) {
    if (isset($_SESSION['csv_data'])) {
        $filename = "histor_" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);

        $output = fopen('php://output', 'w');

        // Encabezados del CSV
        fputcsv($output, array_keys($_SESSION['csv_data'][0]));

        // Datos
        foreach ($_SESSION['csv_data'] as $row) {
            fputcsv($output, $row);
        }

        fclose($output);
        exit();
    } else {
        echo "No hay datos para descargar.";
    }
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../inc/head.php";?>
    <link rel="stylesheet" href="../css/estilo_consultas.css">
    <style>
        body {
            overflow: hidden; /* Evita el desplazamiento de la pantalla */
        }
        .centrado {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh;
        }
    </style>
</head>
<body>
    <div class="barra">
        <h1>EXISTENCIA GENERAL</h1>
    </div>

    <div class="cerrar">
        <form method="post">
            <button name="cerrar_sesion" type="submit">
                <img src="../img/cerrar_sesion.png" alt="cerrar sesión" id="cerrar">
            </button>
        </form>
    </div>

    <div class="regresar">
        <button name="regresar" onclick="window.history.back();">
            <img src="../img/regresar.png" alt="regresar" id="regresar">
        </button>
    </div>

    <div class="csv_alterno">
        <form action="" method="POST">
            <button type="submit" id="csv" name="csv">DESCARGA EXCEL</button>
        </form>
    </div>  
</body>
</html>