<?php
session_start();

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "david123", "metro_cdmx");
$conexion->set_charset("utf8");

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

// Procesar la solicitud de búsqueda por NUMEXP
if (isset($_POST['aceptar_codigo_expediente'])) {
    $codigo_expediente = $_POST['codigo_expediente'];

    // Buscar los movimientos por NUMEXP
    $sql = $conexion->prepare("SELECT * FROM histor WHERE NUMEXP = ?");
    $sql->bind_param("i", $codigo_expediente);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $datos = $result->fetch_all(MYSQLI_ASSOC);

        // Guardar los datos en la sesión para el CSV y la vista preliminar
        $_SESSION['csv_data'] = $datos;

        // Redirigir para refrescar la página
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "No se encontraron resultados para el expediente: $codigo_expediente";
    }

    $sql->close();
}

// Procesar la solicitud de descarga de CSV
if (isset($_POST['csv'])) {
    if (isset($_SESSION['csv_data'])) {
        $filename = "movimientos_expediente_" . date('Ymd') . ".csv";
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
    </style>
</head>
<body>
    <div class="barra">
        <h1>CONSULTA POR EXPEDIENTE</h1>
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

    <div class="entrada_codigo_movimiento">
        <form action="" method="POST">
            <label for="codigo_expediente">TECLEE EL EXPEDIENTE: </label>
            <input type="number" id="codigo_expediente" name="codigo_expediente" required minlength="1" maxlength="7" size="10"/>
            <button type="submit" id="aceptar_codigo_expediente" name="aceptar_codigo_expediente">ACEPTAR</button>
        </form>
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