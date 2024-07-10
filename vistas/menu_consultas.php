
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../inc/head.php";?>
    <link rel="stylesheet" href="../css/estilo_plantilla.css">
</head>
<body >
    <div class="barra">
      <h1>CONSULTAS</h1>
    </div>
    <div class="cerrar" >
    <button name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
    </div>
    <div class="regresar">
    <button name="regresar"><img src="../img/regresar.png" alt="regresar" id="regresar"></button>
    </div>
    <div class="contenedor_botones">
      <button name="btn_consulta_por_fecha" class="estilo_botones"><h2>POR FECHA</h2></button><br><br>
      <button name="btn_consulta_por_codigo"  class="estilo_botones"><h2>POR CÓDIGO</h2></button><br><br>
      <button name="btn_consultas_por_expediente" class="estilo_botones"><h2>POR EXPEDIENTE</h2></button>
    <h1></h1>
      <button name="btn_consultas_al_inventario" class="estilo_botones"><h2>AL EXPEDIENTE</h2></button>
    </div>
    <div class="contenedor_logo">
      <img src ="../img/metro.png" alt="Metro">
    </div>
</body>
</html>