<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../inc/head.php";?>
    <link rel="stylesheet" href="../css/estilo_consultas.css">
</head>
<body>
    <?php
    // Si el formulario de cerrar sesión se ha enviado, destruye la sesión y redirige a index.php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cerrar_sesion'])) {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../index.php"); // Redirige a la página de inicio de sesión
        exit();
    }
    ?>

    <div class="barra">
        <h1>CONSULTA POR EXPEDIENTE</h1>
    </div>

    <div class="cerrar">
        <!-- Formulario que envía una solicitud POST para cerrar sesión -->
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
        <label for="codigo_expediente">TECLEE EL EXPEDIENTE: </label>
        <input type="number" id="codigo_expediente" name="codigo_expediente" required minlength="1" maxlength="7" size="10"/>
        <button id="aceptar_codigo_expediente" name="aceptar_codigo_expediente">ACEPTAR</button>
    </div>

    <div class="csv_alterno">
        <button id="csv" name="csv">DESCARGA CSV</button>
    </div>
</body>
</html>
