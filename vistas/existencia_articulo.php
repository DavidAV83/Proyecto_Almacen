<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../inc/head.php";?>
    <link rel="stylesheet" href="../css/estilo_consultas.css">
</head>
<body >
    <div class="barra">
      <h1>EXISTENCIA DE ARTÍCULO</h1>
    </div>
    <div class="cerrar" >
    <button name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
    </div>
    <div class="regresar">
    <button name="regresar" onclick="window.history.back();"><img src="../img/regresar.png" alt="regresar" id="regresar"></button>
    </div>
    

    <div class="entrada_codigo_movimiento">
        <label for="codigo">TECLEE EL CÓDIGO: </label><input type="number" id="codigo_movimiento" name="codigo_movimiento" required minlength="1" maxlength="7s" size="10"/>
        <button  id="aceptar_codigo_movimiento" name="aceptar_codigo_movimiento">ACEPTAR</button>
        
</div>
<div class="output_section">
    <div class="output_item">
        <label for="descripcion">DESCRIPCIÓN:</label>
        <span id="descripcion_output"></span>
    </div>
    <div class="output_item">
        <label for="existencia">EXISTENCIA:</label>
        <span id="existencia_output"></span>
    </div>
</div>
