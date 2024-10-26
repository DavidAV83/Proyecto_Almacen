<?php
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../inc/head.php";?>
    <link rel="stylesheet" href="../css/estilo_plantilla.css">
</head>
<body>
    <div class="barra">
        <h1>CONSULTA AL INVENTARIO</h1>
    </div>
    <div class="cerrar">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button name="cerrar_sesion" type="submit">
                <img src="../img/cerrar_sesion.png" alt="cerrar sesión" id="cerrar">
            </button>
        </form>
    </div>
    <div class="regresar">
        <button name="regresar" onclick="window.location.href='http://localhost:8000/vistas/menu_consultas.php'">
            <img src="../img/regresar.png" alt="regresar" id="regresar">
        </button>
    </div>
    <div class="contenedor_botones">
        <h1></h1>
        <h1></h1>
        <button name="btn_existencia_general" class="estilo_botones" onclick="location.href='existencia_general.php'">
            <h2>EXISTENCIA GENERAL</h2>
        </button><br><br>
        <h1></h1>
        <button name="btn_existencia_articulo" class="estilo_botones" onclick="location.href='existencia_articulo.php'">
            <h2>EXISTENCIA DE ARTÍCULO</h2>
        </button><br><br>
        <h1></h1>
    </div>
    <div class="contenedor_logo">
        <img src="../img/metro.png" alt="Metro">
    </div>
</body>
</html>