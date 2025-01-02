<?php
session_start(); // Inicia la sesión

if (!isset($_SESSION['usuario'])) {
  header("Location: ../index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <?php include "../inc/head.php"; ?>
  <link rel="stylesheet" href="../css/estilo_plantilla.css">
</head>

<body>
  <div class="barra">
    <h1>ALMACEN CIUDAD AZTECA</h1>
    <h1>ACTUALIZACIONES</h1>
  </div>
  <div class="cerrar">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <button name="cerrar_sesion" type="submit"><img src="../img/cerrar_sesion.png" alt="cerrar sesion"
          id="cerrar"></button>
    </form>
    <?php
    if (isset($_POST['cerrar_sesion'])) {
      // Destruye la sesión
      session_destroy();

      // Establece las cabeceras HTTP para evitar la caché
      header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
      header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
      header('Cache-Control: no-store, no-cache, must-revalidate');
      header('Pragma: no-cache');

      // Redirige a index.php
      header('Location: ../index.php');
      exit;
    }
    ?>
  </div>
  <div class="contenedor_botones">
    <button name="btn_consultas" onclick="location.href='menu_consultas.php'" class="estilo_botones">
      <h2>CONSULTAS</h2>
    </button><br><br>
    <button name="btn_entradas" onclick="location.href='entradas.php'" class="estilo_botones">
      <h2>ENTRADAS</h2>
    </button><br><br>
    <button name="btn_salidas" onclick="location.href='menu_salidas.php'" class="estilo_botones">
      <h2>SALIDAS</h2>
    </button><br><br>
    <button name="btn_alta" onclick="location.href='alta_usuarios.php'" class="estilo_botones">
      <h2>ALTA DE USUARIOS</h2>
    </button>
  </div>
  <div class="contenedor_logo">
    <img src="../img/metro.png" alt="Metro">
  </div>
</body>

</html>