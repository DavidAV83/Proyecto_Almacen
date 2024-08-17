
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../inc/head.php";?>
    <link rel="stylesheet" href="../css/estilo_plantilla.css">
</head>
<body >
    <div class="barra">
      <h1>CONSULTA AL INVENTARIO </h1>
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
      <button name="btn_existencia_general" class="estilo_botones" onclick="location.href='existencia_general.php'"><h2>EXISTENCIA GENERAL</h2></button><br><br>
      <h1></h1>
      <button name="btn_existencia_articulo"  class="estilo_botones" onclick="location.href='existencia_articulo.php'"><h2>EXISTENCIA DE ARTÍCULO</h2></button><br><br>
      <h1></h1>
      
     
      
      
      
      
    </div>
    <div class="contenedor_logo">
      <img src ="../img/metro.png" alt="Metro">
    </div>
</body>
</html>