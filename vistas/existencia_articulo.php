<?php
session_start();

// Habilitar el reporte de errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "david123", "metro_cdmx");
$conexion->set_charset("utf8");

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

// Variables para los resultados
$descripcion = '';
$existencia = '';

// Procesar la solicitud de búsqueda por código de movimiento
if (isset($_POST['aceptar_codigo_movimiento'])) {
    $codigo_movimiento = $_POST['codigo_movimiento'];

    // Validar que el código sea un número entero (incluyendo 0)
    if (filter_var($codigo_movimiento, FILTER_VALIDATE_INT) !== false) {
        // Prepara la consulta SQL para obtener la existencia más reciente
        $sql = "
            SELECT DESCRIPCIO, EXISTENCIA
            FROM histor
            WHERE CODIGO = ?
            ORDER BY FECHA DESC
            LIMIT 1
        ";

        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('i', $codigo_movimiento);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $descripcion = $row['DESCRIPCIO'];
            $existencia = $row['EXISTENCIA'];

            // Guardar los datos en la sesión para el CSV
            $_SESSION['csv_data'] = $row;
        } else {
            $descripcion = "No se encontraron resultados para el código: $codigo_movimiento";
            $existencia = '';
        }

        $stmt->close();
    } else {
        $descripcion = "Código inválido. Debe ser un número entero.";
    }
}

// Procesar la solicitud de descarga de CSV
if (isset($_POST['descargar_csv'])) {
    if (isset($_SESSION['csv_data'])) {
        $filename = "movimiento_" . $_SESSION['csv_data']['CODIGO'] . "_" . date('Ymd') . ".csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $filename);

        $output = fopen('php://output', 'w');

        // Encabezados del CSV
        fputcsv($output, array_keys($_SESSION['csv_data']));

        // Datos
        fputcsv($output, $_SESSION['csv_data']);

        fclose($output);
        exit();
    } else {
        echo "No hay datos para descargar.";
    }
}

// Procesar la solicitud de cierre de sesión
if (isset($_POST['cerrar_sesion'])) {
    session_destroy();
    header("Location: ../index.php"); // Redirige a la página de inicio
    exit();
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
        <h1>EXISTENCIA DE ARTÍCULO</h1>
    </div>
    <div class="cerrar">
        <form method="post" action="">
            <button type="submit" name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
        </form>
    </div>
    <div class="regresar">
        <button name="regresar" onclick="window.history.back();"><img src="../img/regresar.png" alt="regresar" id="regresar"></button>
    </div>

    <div class="entrada_codigo_movimiento">
        <form method="post" action="">
            <label for="codigo">TECLEE EL CÓDIGO: </label>
            <input type="number" id="codigo_movimiento" name="codigo_movimiento" required minlength="1" maxlength="7" size="10"/>
            <button type="submit" id="aceptar_codigo_movimiento" name="aceptar_codigo_movimiento">ACEPTAR</button>
        </form>
    </div>

    <div class="output_section">
        <div class="output_item">
            <label for="descripcion">DESCRIPCIÓN:</label>
            <span id="descripcion_output">
                <?php if (isset($descripcion)) echo htmlspecialchars($descripcion); ?>
            </span>
        </div>
        <div class="output_item">
            <label for="existencia">EXISTENCIA:</label>
            <span id="existencia_output">
                <?php if (isset($existencia)) echo htmlspecialchars($existencia); ?>
            </span>
        </div>
        <?php if (isset($codigo_movimiento) && !empty($descripcion)): ?>
        <form method="post" action="">
            <button type="submit" name="descargar_csv" style="background-color: #f86225; color: white; padding: 10px 30px; font-weight: bold; border-radius: 5px; font-size: 14px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);border: 2px solid #000;
                color: #000; font-family: 'Open Sans', sans-serif;">DESCARGAR CSV</button>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>