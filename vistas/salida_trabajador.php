<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../inc/head.php"; ?>
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
        <button name="regresar" onclick="window.history.back();"><img src="../img/regresar.png" alt="regresar" id="regresar"></button>
    </div>

    <div class="salida_expediente_codigo">
        <label for="codigo">TECLEE EL EXPEDIENTE: </label><input type="number" id="expediente" name="expediente"
            minlength="1" maxlength="7" size="10" />
        <button id="aceptar_expediente" name="aceptar_expediente">
            <h2>ACEPTAR</h2>
        </button>
        <br>
        <br>
        <label for="nombre">NOMBRE: </label><input type="text" name="nombre" id="nombre" disabled>
        <br>
        <br>
        <label for="categoria">CATEGORIA: </label><input type="text" name="categoria" id="categoria" disabled>
    </div>

    <div class="formulario_salida">
        <form action="">
            <label for="fecha_mov">FECHA: </label><input type="date" id="fecha_mov" name="fecha_mov">
            <br>
            <br>
            <div class="insertar_codigo">
                <label for="codigo">CÓDIGO: </label><input type="text" id="codigo" name="codigo" required minlength="1"
                    maxlength="7s" size="10">
                <button id="aceptar_codigo" name="aceptar_codigo">
                    <h2>ACEPTAR</h2>
                </button>
            </div>
            <br>
            <label for="existencia">EXISTENCIA ACTUAL: </label><input type="text" name="existencia" id="existencia"
                disabled>
            <br>
            <br>
            <label for="folio">FOLIO: </label><input type="text" id="folio" name="folio" required minlength="1"
                maxlength="7s" size="10">
            <br>
            <br>
            <label for="cantidad">CANTIDAD ENTREGADA: </label><input type="number" name="cantidad" id="cantidad">
            <br>
            <br>

            <div class="seleccion">
                <label for="tren">TREN: </label><select name="tren" id="tren">
                    <option>SELECCIONA EL TREN</option>
                    <option value="tren_uno">TREN UNO</option>
                    <option value="tren_dos">TREN DOS</option>
                    <option value="tren_tres">TREN TRES</option>
                </select>
                <br>
                <br>
                <label for="area">ÁREA: </label><select name="area" id="area">
                    <option>SELECCIONA UNA ÁREA</option>
                    <option value="area_uno">ÁREA UNO</option>
                    <option value="area_dos">ÁREA DOS</option>
                    <option value="area_tres">ÁREA TRES</option>
                </select>
            </div>

            <div class="ultimo_folio">
                <br>
                <br>
                <br>
                <br>
                <label for="ultimo_f">ULTIMO FOLIO CAPUTURADO: </label><input type="text" name="ultimo_f" id="ultimo_f"
                    disabled>
            </div>
        </form>
    </div>
    <div class="selec_carro">
        <button name="carro_uno">XXX</button>
        <button name="carro_dos">XXXX</button>
        <button name="carro_tres">XXXX</button>
        <button name="carro_cuatro">XXXX</button>
        <button name="carro_cinco">XXXX</button>
        <button name="carro_seis">XXXX</button>
        <button name="carro_siete">XXXX</button>
        <button name="carro_ocho">XXXX</button>
        <button name="carro_nueve">XXX</button>
        <label for="selec_todo">TODOS LOS CARROS</label><input type="checkbox" name="select_todo"></input>
    </div>
    <div class="guardar_cancelar">
        <button name="guardar">
            <h2>GUARDAR</h2>
        </button>
        <button name="cancelar">
            <h2>CANCELAR</h2>
        </button>
    </div>
</body>

</html>