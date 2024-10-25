
<?php
session_start();

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "david123", "metro_cdmx");
$conexion->set_charset("utf8");

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

// Procesar la solicitud de vista previa de datos
if (isset($_POST['csv'])) {
    $fecha_inicio = $_POST['fecha_inicio'] ?? '';
    $fecha_fin = $_POST['fecha_fin'] ?? '';
    $entrada_caja_chica = isset($_POST['entrada_caja_chica']) ? true : false;
    $inv_mensual_actual = isset($_POST['inv_mensual_actual']) ? true : false;

    if (!empty($fecha_inicio) && !empty($fecha_fin)) {
        // Construir la consulta SQL con los parámetros de fecha
        $sql = "SELECT * FROM histor WHERE (FECHAENT BETWEEN ? AND ? OR FECHA BETWEEN ? AND ?)";

        // Si se selecciona "ENTRADA POR CAJA CHICA", agregar la condición para `ESTABLE`
        if ($entrada_caja_chica) {
            $sql .= " AND ESTABLE IS NOT NULL AND ESTABLE != ''";
        }

        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssss", $fecha_inicio, $fecha_fin, $fecha_inicio, $fecha_fin);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $datos = $result->fetch_all(MYSQLI_ASSOC);

            // Guardar los datos en la sesión para la vista previa y la descarga
            $_SESSION['csv_data'] = $datos;
        } else {
            $_SESSION['csv_data'] = []; // Establecer a un arreglo vacío si no hay datos
            echo "No se encontraron resultados para el rango de fechas seleccionado.";
        }

        $stmt->close();
    } else {
        echo "Por favor, seleccione un rango de fechas.";
    }
}

// Procesar la solicitud de descarga del CSV
if (isset($_POST['descargar_csv'])) {
    if (isset($_SESSION['csv_data']) && !empty($_SESSION['csv_data'])) {
        $filename = "datos_" . date('Ymd') . ".csv";
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
        .form-container {
            display: flex;
            gap: 20px;
            align-items: flex-end;
        }
        .entrada_codigo {
            display: flex;
            flex-direction: column;
        }
        .multiple {
            display: flex;
            flex-direction: column;
        }
        .csv {
            margin-top: 20px;
            text-align: center;
           
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
        button#csv, button#descargar {
            background-color: #f86225; /* Color naranja */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button#csv:hover, button#descargar:hover {
            background-color: #db5b20; /* Color ligeramente más oscuro para hover */
        }
    </style>
</head>
<body>
    <div class="barra">
        <h1>CONSULTAS POR FECHA</h1>
    </div>
    <div class="cerrar">
        <button name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesión" id="cerrar"></button> 
    </div>
    <div class="regresar">
        <button name="regresar" onclick="window.history.back();"><img src="../img/regresar.png" alt="regresar" id="regresar"></button>
    </div>

    <form action="" method="POST">
        <div class="form-container">
            <div class="entrada_codigo">
                <label for="fecha_inicio">DEL DÍA: </label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" required minlength="1" maxlength="10" size="10"/>
                <h1></h1>
                <label for="fecha_fin">AL DÍA: </label>
                <input type="date" id="fecha_fin" name="fecha_fin" required minlength="1" maxlength="10" size="10"/>
            </div>
            
            <div class="multiple">
                <label>
                    <input type="radio" name="tipo_consulta" value="inv_mensual_actual">
                    INV. MENSUAL ACTUAL
                </label><br>
                <label>
                    <input type="radio" name="tipo_consulta" value="entrada_caja_chica">
                    ENTRADA POR CAJA CHICA
                </label>
            </div>
        </div>

        <div class="csv">
            <button id="csv" name="csv" type="submit" style="background-color: #f86225; color: white; padding: 10px 30px; font-weight: bold; border-radius: 5px; font-size: 14px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); border: 2px solid #000;
            color: #000; font-family: 'Open Sans', sans-serif;">
                ACEPTAR
            </button>
        </div>

        <?php if (isset($_SESSION['csv_data']) && count($_SESSION['csv_data']) > 0): ?>
            <div class="csv">
                <button id="descargar" type="submit" name="descargar_csv" style="background-color: #f86225; color: white; padding: 10px 30px; font-weight: bold; border-radius: 5px; font-size: 14px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);border: 2px solid #000;
                color: #000; font-family: 'Open Sans', sans-serif;">
                    DESCARGAR EXCEL
                </button>
            </div>
        <?php endif; ?>
    </form>

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