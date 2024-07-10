<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../inc/head.php";?>
    <link rel="stylesheet" href="../css/estilo_plantilla.css">
    <link rel="stylesheet" href="../css/estilo_salidas.css">
</head>
<body>
    <div class="barra">
      <h1>REGISTRO DE SALIDAS</h1>
      <h1>ENTREGADO A TRABAJADOR</h1>
    </div>
    <div class="cerrar">
    <button name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
    </div>
    <div class="regresar">
    <button name="regresar"><img src="../img/regresar.png" alt="regresar" id="regresar"></button>
    </div>
    <div class="salida_expediente">
        <label for="codigo">TECLEE EL EXPEDIENTE: </label><input type="text" id="expediente" name="expediente" required minlength="1" maxlength="7s" size="10"/>
        <button id="aceptar_expediente" name="aceptar_expediente">ACEPTAR</button>
    </div>
    <div class="formulario_salida_entregado_trabajador">
    <form action="">
    <label for="nombre">NOMBRE:</label>
    <br>
    <br>
    <label for="categoria">CATEGORIA: </label>
    <br>
    <br>
    <br>
    <label for="fecha_mov">FECHA: </label><input type="date" id="fecha_mov" name="fecha_mov"/>
    <br>
    <br>
    <label for="codigo">CÓDIGO: </label><input type="text" id="codigo" name="codigo" required minlength="1" maxlength="7s" size="10">
    <br>
    <br>
    <label for="folio">FOLIO: </label><input type="text" id="folio" name="folio" required minlength="1" maxlength="7s" size="10"/>
    <br>
    <br>
    <label for="cantidad">CANTIDAD ENTREGADA: </label><input type="text" name="cantidad" id="cantidad">
    <br>
    <br>
    <label for="tren">TREN: </label><select name="tren" id="tren">
        <option value="tren_uno">TREN UNO</option>
        <option value="tren_dos">TREN DOS</option>
        <option value="tren_tres">TREN TRES</option>
    </select>
    <br>
    <br>
    <label for="area">ÁREA: </label><select name="area" id="area">
        <option value="area_uno">ÁREA UNO</option>
        <option value="area_dos">ÁREA DOS</option>
        <option value="area_tres">ÁREA TRES</option>
    </select>
    </form>
    </div>
    <div class="selec_carro">
        <button name="carro_uno">1</button>
        <button name="carro_dos">2</button>
        <button name="carro_tres">3</button>
        <button name="carro_cuatro">4</button>
        <button name="carro_cinco">5</button>
        <button name="carro_seis">6</button>
        <button name="carro_siete">7</button>
        <button name="carro_ocho">8</button>
        <button name="carro_nueve">9</button>
    </div>
</body>
</html>