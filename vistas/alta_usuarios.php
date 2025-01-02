<?php
session_start();

if (isset($_SESSION['usuario']) && isset($_SESSION['nombre'])) {
    $expediente_usuario = $_SESSION['usuario'];
    $nombre_usuario = $_SESSION['nombre'];    
} else {
    echo "No se ha iniciado sesión.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Control de Inventarios</title>
    <link rel="stylesheet" href="../css/estilo_entradas.css">
</head>
<body>
    <div>
    <header>
        <h1> REGISTRO DE NUEVOS USUARIOS </h1>	
    </header>
    </div>
    <div class="cerrar">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button name="cerrar_sesion" type="submit"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
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
    <h1></h1>
    <div class="regresar">
    <button name="regresar" onclick="window.location.href='home.php';"><img src="../img/regresar.png" alt="regresar" id="regresar"></button>
    </div>
    <main>     
     
 <form id="formAgregarUsuario" method="POST">              
<div class="main-container"> 
<div class="form-container_2">   
	
        <div class="form-group">
            <label for="expediente_us">EXPEDIENTE:  </label>
            <input type="text" id="expediente_us" name="expediente_us" required oninput="validarNumeros(this)">
	    <script>
		function validarNumeros(input) {
		    // Remueve cualquier carácter que no sea un número
		    input.value = input.value.replace(/[^0-9]/g, '');
		}
	     </script>
        </div>
        
        <div class="form-group">
            <label for="nombre_us">NOMBRE:     </label>
            <input type="text" id="nombre_us" name="nombre_us">
        </div>
	<div class="form-group">
            <label for="categoria_us">CATEGORIA:     </label>
            <input type="text" id="categoria_us" name="categoria_us">
        </div><br>        	
	<div>
		<button type="button" onclick="enviarDatos();">GUARDAR: </button>
		<button onclick="location.href='404.html'">CANCELAR</button>
	</div>
	 </form>
</div> 

<p id="mensaje" style="color: red; position: fixed; bottom: 10px; width: 100%; text-align: center; margin-bottom: 10px;"></p>

    <script>
        function enviarDatos() {            
            var formData = new FormData(document.getElementById('formAgregarUsuario'));
           
            fetch('../php/alta_usuario.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById("mensaje").innerText = data;
            })
            .catch(error => {
                console.error("Error al enviar los datos:", error);
                document.getElementById("mensaje").innerText = "Hubo un error al enviar los datos.";
            });
        }
    </script>

    </main>   
</body>
</html>