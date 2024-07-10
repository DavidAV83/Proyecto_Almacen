<!--Al haber seleccionado la opción "ENTRADAS" de la vista home.php se mostrará esta vista, la cual tiene tres botones de selección
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
      <h1>ENTRADAS</h1>
    </div>
    <div class="cerrar" >
    <button name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
    </div>
    <div class="regresar">
    <button name="regresar"><img src="../img/regresar.png" alt="regresar" id="regresar"></button>
    </div>
    <div class="contenedor_botones">
      <button name="btn_entrada_a" class="estilo_botones"><h2>ENTRADA POR ALMACÉN</h2></button><br><br>
      <button name="btn_entrada_cc"  class="estilo_botones"><h2>ENTRADA POR CAJA CHICA</h2></button><br><br>
      <button name="btn_entrada_oa" class="estilo_botones"><h2>PRÉSTAMO DE OTRA ÁREA</h2></button>
    </div>
    <div class="contenedor_logo">
      <img src ="../img/metro.png" alt="Metro">
    </div>
</body>
</html>