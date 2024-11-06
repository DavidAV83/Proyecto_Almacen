<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Control de Inventarios</title>
    <link rel="stylesheet" href="../css/estilo_plantilla.css">
</head>
<body>   
    <div class="barra">
        <h1>MENÚ PRINCIPAL DE ENTRADAS</h1>
    </div>
    <div class="cerrar">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button name="cerrar_sesion" type="submit"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
        </form>
        <?php
        if (isset($_POST['cerrar_sesion'])) {
            session_destroy();
                      
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
            header('Cache-Control: no-store, no-cache, must-revalidate');
            header('Pragma: no-cache');
            
            header('Location: ../index.php');
            exit;
        }
        ?>
    </div>
    <h1></h1>
    <div class="regresar">
    <button name="regresar" onclick="window.history.back();"><img src="../img/regresar.png" alt="regresar" id="regresar"></button>
    </div>
<div class="contenedor_botones">
    <h1></h1>
    <h1></h1>
    <button onclick="location.href='entrada_almacen.php'" class="estilo_botones"><h2>ENTRADA POR ALMACÉN</h2></button><br><br>
    <button onclick="location.href='entrada_cajachica.php'" class="estilo_botones"><h2>ENTRADA POR CAJA CHICA</h2></button><br><br>
    <button onclick="location.href='entrada_prestamo.php'" class="estilo_botones"><h2>PRÉSTAMO DE OTRA ÁREA</h2></button>
    <h1></h1>
</div>
<h1></h1>
<h1></h1>
<div class="contenedor_logo">
    <img src ="../img/metro.png" alt="Metro">
</div>
</body>
</html>
