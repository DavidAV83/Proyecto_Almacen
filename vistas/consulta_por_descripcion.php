<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../inc/head.php";?>
    <link rel="stylesheet" href="../css/estilo_consultas.css">
</head>
<body>
    <div class="barra">
        <h1>CONSULTAS DE MOVIMIENTOS POR DESCRIPCIÓN</h1>
    </div>
    <div class="cerrar">
        <button name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
    </div>
    <div class="regresar">
        <button name="regresar" onclick="window.history.back();"><img src="../img/regresar.png" alt="regresar" id="regresar"></button>
    </div>
    
    <div class="entrada_codigo_movimiento">
        <label for="descripcion">SELECCIONE LA DESCRIPCIÓN: </label>
        <select id="descripcion" name="descripcion">
            <option value="desc1">Descripción 1</option>
            <option value="desc2">Descripción 2</option>
            <option value="desc3">Descripción 3</option>
           
        </select>
        <button id="aceptar_codigo_movimiento" name="aceptar_codigo_movimiento">ACEPTAR</button>
    </div>
    <div class="csv_alterno">
        <button id="csv" name="csv">DESCARGA CSV</button>
    </div>  
</body>
</html>
