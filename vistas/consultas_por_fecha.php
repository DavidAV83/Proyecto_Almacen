
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../inc/head.php";?>
    <link rel="stylesheet" href="../css/estilo_consultas.css">
</head>
<body >
    <div class="barra">
      <h1>CONSULTAS POR FECHA</h1>
    </div>
    <div class="cerrar" >
    <button name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
    </div>
    <div class="regresar">
    <button name="regresar"><img src="../img/regresar.png" alt="regresar" id="regresar"></button>
    </div>


    </div>
    <div class="entrada_codigo">
        <label for="codigo">DEL DÍA: </label><input type="text" id="codigo" name="codigo" required minlength="1" maxlength="7s" size="10"/>
        <button  id="aceptar_codigo" name="aceptar_codigo">ACEPTAR</button>
        <label for="codigo">AL DÍA: </label><input type="text" id="codigo" name="codigo" required minlength="1" maxlength="7s" size="10"/>
        
    </div>


    <div  class="multiple">
        <label>
            <input type="checkbox" name="opcion1" value="opcion1">
            INV. MENSUAL ACTUAL 
        </label><br>
        <h1></h1>
        <label>
            <input type="checkbox" name="opcion1" value="opcion1">
            CONSUMO MENSUAL  
        </label><br>
        <h1></h1>
        <label>
            <input type="checkbox" name="opcion1" value="opcion1">
            GENERAL
        </label><br>
        <h1></h1>
        <label>
            <input type="checkbox" name="opcion1" value="opcion1">
            ENTRADA POR CAJA CHICA
        </label><br>
        
    </div>

    <div class="csv">
    <button  id="csv" name="csv">DESCARGA CSV</button>
    </div>

</body>
</html>