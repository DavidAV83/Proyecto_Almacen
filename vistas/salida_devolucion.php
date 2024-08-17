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
        <h1>POR PRESTAMO A OTRA ÁREA</h1>
    </div>

    <div class="cerrar">
        <button name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
    </div>

    <div class="regresar">
        <button name="regresar" onclick="window.history.back();"><img src="../img/regresar.png" alt="regresar" id="regresar"></button>
    </div>

    <div class="salida_expediente_codigo">
        <label for="codigo">CÓDIGO: </label><input type="text" id="codigo" name="codigo" minlength="1" maxlength="7"
            size="10" />
        <button id="aceptar_codigo" name="aceptar_codigo">
            <h2>ACEPTAR</h2>
        </button>
    </div>

    <div class="formulario_salida_dos">
        <form action="">
            <label for="fecha_mov">FECHA: </label><input type="date" id="fecha_mov" name="fecha_mov">
            <br><br>
            <label for="folio">FOLIO: </label><input type="text" id="folio" name="folio" required minlength="1"
                maxlength="7s" size="10">
            <br><br>

            <div class="seleccion">
                <label for="area">ÁREA DE DESTINO: </label><select name="area" id="area">
                    <option>SELECCIONA UNA ÁREA</option>
                    <option value="area_uno">ÁREA UNO</option>
                    <option value="area_dos">ÁREA DOS</option>
                    <option value="area_tres">ÁREA TRES</option>
                </select>
            </div>
            <br><br>
            <label for="persona_recibe">NOMBRE DE LA PERSONA QUE RECIBE: </label><input type="text" name="persona_recibe">
            <br><br>
            <label for="persona_entrega">NOMRBE DE LA PERSONA QUE ENTREGA: </label><input type="text" name="persona_entrega">
            <br><br>
            <label for="motivo_dev">MOTIVO DE LA DEVOLUCIÓN: </label><input type="text" name="motivo_dev">
            <br><br>
            <label for="observaciones">OBSERVACIONES: </label><input type="text" name="observaciones">
        </form>
    </div>

    <div class="formulario_salida_cuatro">
        <form action="">
            <label for="descripcion">DESCRIPCIÓN: </label><input type="text" name="descripcion" disabled>
            <br><br>
            <label for="existencia">EXISTENCIA ACTUAL: </label><input type="text" name="existencia" disabled>
            <br><br>
            <label for="cantidad_ent">CANTIDAD ENTREGADA: </label><input type="number" name="cantidad_ent">
        </form>
    </div>
    <div class="guardar_cancelar_dos">
        <button name="guardar">
            <h2>GUARDAR</h2>
        </button>
        <button name="cancelar">
            <h2>CANCELAR</h2>
        </button>
    </div>
</body>
</html>