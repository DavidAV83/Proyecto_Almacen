<!--Al haber seleccionado la opción "SALIDASs" de la vista home.php se mostrará esta vista, la cual tiene tres botones de selección
más dos botones "Cerrar sesión" y "Regresar"-->
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../inc/head.php";?>
    <link rel="stylesheet" href="../css/estilo_plantilla.css">
</head>
<body >
    <div class="barra">
      <h1>MENÚ PRINCIPAL</h1>
      <h1>SALIDAS</h1>
    </div>
    <div class="cerrar" >
    <button name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
    </div>
    <div class="regresar">
    <button name="regresar"><img src="../img/regresar.png" alt="regresar" id="regresar"></button>
    </div>
    <div class="contenedor_botones">
      <button name="btn_entregado_trabajador" class="estilo_botones" onclick="location.href='salida_trabajador.php'"><h2>ENTREGADO A TRABAJADOR</h2></button><br><br>
      <button name="btn_prestamo_oa"  class="estilo_botones" onclick="location.href='salida_prestamo.php'"><h2>PRESTAMO A OTRA ÁREA</h2></button><br><br>
      <button name="btn_devuelto_almacen" class="estilo_botones" onclick="location.href='salida_devolucion.php'"><h2>DEVUELTO AL ALMACÉN</h2></button>
    </div>
    <div class="contenedor_logo">
      <img src ="../img/metro.png" alt="Metro">
    </div>
</body>
</html>