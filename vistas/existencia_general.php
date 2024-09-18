<?php
ini_set('memory_limit', '3G');

session_start();

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "Terry231", "metro_azteca");
$conexion->set_charset("utf8");

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

// Obtener todos los datos de la tabla histor para la vista previa y descarga
$sql = "SELECT * FROM histor";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $datos = $result->fetch_all(MYSQLI_ASSOC);
    
    // Guardar los datos en la sesión para la vista previa y descarga de CSV
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
        .vista_csv {
            max-height: 50vh; /* Limita la altura de la tabla */
            overflow-y: auto; /* Habilita el desplazamiento solo dentro de la tabla si es necesario */
            margin-top: 20px;
            padding: 15px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1); /* Sombra alrededor de la tabla */
            border-radius: 8px; /* Bordes redondeados */
        }
        table {
            width: 100%;
            border-collapse: collapse; /* Unir bordes */
            background-color: #ffffff; /* Fondo blanco de la tabla */
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd; /* Bordes grises y delgados */
        }
        th {
            background-color: #f2f2f2; /* Fondo gris claro para encabezados */
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9; /* Fondo gris claro para filas pares */
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
            <button name="cerrar_sesion">
                <img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar">
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

    <?php if (isset($_SESSION['csv_data']) && count($_SESSION['csv_data']) > 0): ?>
        <div class="vista_csv">
            <h2>Vista previa de los datos</h2>
            <table>
                <thead>
                    <tr>
                        <?php foreach (array_keys($_SESSION['csv_data'][0]) as $header): ?>
                            <th><?php echo htmlspecialchars($header); ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['csv_data'] as $row): ?>
                        <tr>
                            <?php foreach ($row as $column): ?>
                                <td><?php echo htmlspecialchars($column); ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</body>
</html>
