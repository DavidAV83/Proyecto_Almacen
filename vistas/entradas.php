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
<div class="cerrar" >
    <button name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
    </div>
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
