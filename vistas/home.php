<!--Esta vista será la primera que aparecerá al ingresar una clave correcta en el login.php-->
<?php
session_name("sesion");
session_id();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../inc/head.php";?>
    <link rel="stylesheet" href="../css/estilo_plantilla.css">
</head>
<body>
    <div class="barra">
      <h1>SUBJEFATURA DE PROGRAMACIÓN Y EVALUACIÓN</h1>
      <h1>CIUDAD AZTECA</h1>
    </div>
    <div class="cerrar">
    <button name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
    </div>
    <div class="contenedor_botones">
      <button name="btn_consultas"  onclick="location.href='menu_consultas.php'"  class="estilo_botones"><h2>CONSULTAS</h2></button><br><br>
      <button name="btn_entradas" onclick="location.href='entradas.php'"  class="estilo_botones"><h2>ENTRADAS</h2></button><br><br>
      <button name="btn_salidas"  onclick="location.href='menu_salidas.php'"  class="estilo_botones"><h2>SALIDAS</h2></button>
    </div>
    <div class="contenedor_logo">
      <img src ="../img/metro.png" alt="Metro">
    </div>
</body>
</html>