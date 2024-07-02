<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../inc/head.php";?>
    <link rel="stylesheet" href="../css/estilo_plantilla.css">
</head>
<body>
    <div class="barra">
      <h1>REGISTRO DE ENTRADA</h1>
      <h1>POR ALMACÉN</h1>
    </div>
    <div class="cerrar">
    <button name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
    </div>
    <div class="regresar">
    <button name="regresar"><img src="../img/regresar.png" alt="regresar" id="regresar"></button>
    </div>
    <div class="entrada_codigo">
        <label for="codigo">CÓDIGO: </label><input type="text" id="codigo" name="codigo" required minlength="1" maxlength="7s" size="10"/>
        <button id="aceptar_codigo" name="aceptar_codigo">ACEPTAR</button>
    </div>
    <div class="formulario_entrada_almacen">
    <form action="">
    <label for="num_almacen">No. ALMACÉN: </label><input type="text" id="num_almacen" name="num_almacen" required minlength="1" maxlength="7s" size="10"/>
    <br>
    <br>
    <label for="folio">FOLIO: </label><input type="text" id="folio" name="folio" required minlength="1" maxlength="7s" size="10">
    <br>
    <br>
    <label for="num_vale">No. VALE: </label><input type="text" id="num_vale" name="num_vale" required minlength="1" maxlength="7s" size="10"/>
    <br>
    <br>
    <label for="fecha">FECHA: </label><input type="text" id="fecha" name="fecha" required minlength="1" maxlength="7s" size="10">
    <br>
    <br>
    <label for="fecha">CANTIDAD: </label><input type="text" id="fecha" name="fecha" required minlength="1" maxlength="7s" size="10"/>
    </form>
    </div>
</body>
</html>