<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../inc/head.php";?>
    <link rel="stylesheet" href="../css/estilo_plantilla.css">
</head>
<body>
    <div class="barra">
        <h1>CONSULTAS</h1>
    </div>
    <div class="cerrar">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button name="cerrar_sesion" type="submit">
                <img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar">
            </button>
        </form>
    </div>
    <div class="regresar">
        <button name="regresar" onclick="window.location.href='http://localhost:8000/vistas/home.php'">
            <img src="../img/regresar.png" alt="regresar" id="regresar">
        </button>
    </div>
    <div class="contenedor_botones">
        <button name="btn_consulta_por_fecha" class="estilo_botones" onclick="location.href='consultas_por_fecha.php'">
            <h2>POR FECHA</h2>
        </button><br><br>
        <button name="btn_consulta_por_codigo" class="estilo_botones" onclick="location.href='consulta_movimientos_por_codigo.php'">
            <h2>POR CÓDIGO</h2>
        </button><br><br>
        <button name="btn_consultas_por_expediente" class="estilo_botones" onclick="location.href='consulta_expediente.php'">
            <h2>POR EXPEDIENTE</h2>
        </button><br><br>
        <button name="btn_consulta_por_descripcion" class="estilo_botones" onclick="location.href='consulta_por_descripcion.php'">
            <h2>POR DESCRIPCIÓN</h2>
        </button><br><br>
        <button name="btn_consultas_al_inventario" class="estilo_botones" onclick="location.href='menu_consultas_al_inventario.php'">
            <h2>AL INVENTARIO</h2>
        </button>
    </div>
    <div class="contenedor_logo">
        <img src ="../img/metro.png" alt="Metro">
    </div>
</body>
</html>