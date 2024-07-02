<!--Esta vista será la primera que aparecerá al ingresar una clave correcta en el login.php-->
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../inc/head.php";?>
    <link rel="stylesheet" href="../css/estilo_plantilla.css">
</head>
<body>
    <div class="barra">
      <h1>ALMACEN CIUDAD AZTECA</h1>
      <h1>ACTUALIZACIONES</h1>
    </div>
    <div class="cerrar">
    <button name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
    </div>
    <div class="contenedor_botones">
      <button name="btn_consultas" class="estilo_botones"><h2>CONSULTAS</h2></button><br><br>
      <button name="btn_entradas"  class="estilo_botones"><h2>ENTRADAS</h2></button><br><br>
      <button name="btn_salidas" class="estilo_botones"><h2>SALIDAS</h2></button>
    </div>
    <div class="contenedor_logo">
      <img src ="../img/metro.png" alt="Metro">
    </div>
</body>
</html>