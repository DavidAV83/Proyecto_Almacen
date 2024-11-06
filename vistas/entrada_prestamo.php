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
    <header>
        <h1> REGISTRO DE ENTRADAS POR PRÉSTAMO </h1>	
    </header>
    <div class="cerrar">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button name="cerrar_sesion" type="submit"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
        </form>
        <?php
        if (isset($_POST['cerrar_sesion'])) {          
            session_destroy();
                      
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
            header('Cache-Control: no-store, no-cache, must-revalidate');
            header('Pragma: no-cache');
                     
            header('Location: ../index.php');
            exit;
        }
        ?>
    </div>
    <h1></h1>
    <div class="regresar">
    <button name="regresar" onclick="window.history.back();"><img src="../img/regresar.png" alt="regresar" id="regresar"></button>
    </div>
    <main>
       	<div class="form-container">   
            <label for="input-text">CÓDIGO: </label>
            <input type="text" id="codigo">		
            <button onclick="obtenerDatos()">ACEPTAR</button>
        </div>   
<form id="formAgregarExistencia">                 
<div class="main-container"> 
<div class="form-container_2">   
            <div class="form-group">
            <label for="no_almacenprestamos">No. ALMACÉN:  </label>
            <input type="text" id="no_almacenprestamos" name="no_almacenprestamos">
        </div>
        
        <div class="form-group">
            <label for="folio_prestamos">FOLIO:     </label>
            <input type="text" id="folio_prestamos" name="folio_prestamos">
        </div>
        
        <div class="form-group">
            <label for="no_vale_prestamos">No. VALE: </label>
            <input type="text" id="no_vale_prestamos" name="no_vale_prestamos">
        </div>
        
        <div class="form-group">
            <label for="fecha_prestamos">FECHA: </label>            
	    <input type="date" id="fecha_prestamos" name="fecha_prestamos">
        </div>
        
        <div class="form-group">
            <label for="cantidad_prestamos">CANTIDAD:</label>
            <input type="text" id="cantidad_prestamos" name="cantidad_prestamos">
        </div>

	<div class="form-group">
            <label for="observaciones_prestamos">OBSERVACIONES:</label>
            <input type="text" id="observaciones_prestamos" name="observaciones_prestamos">
        </div>
	</form>
</div> 

<script>
        function obtenerDatos() {          
            var codigo = document.getElementById('codigo').value;
           
            var xhr = new XMLHttpRequest();
                      
            xhr.open('GET', '../php/consulta_datos.php?codigo=' + codigo, true);
          
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {                    
                    var datos = JSON.parse(xhr.responseText);
             
                    if (datos.error) {
                        alert(datos.error);
                    } else {                    
                        document.getElementById('existencia').value = datos.existencia;
                        document.getElementById('descripcion').value = datos.descripcion;
                        document.getElementById('costo').value = datos.costo;
                    }
                }
            };

            xhr.send();
        }
    </script>

<div class="form-container_3"> 
	<div class="form-group">
            <label for="existencia">EXISTENCIAS A LA FECHA:</label>  
	    <input type="text" id="existencia" value="54321" readonly>          
        </div>
	<div class="form-group">
            <label for="descripcion_almacen">DESCRIPCIÓN:</label> 
	    <input type="text" id="descripcion" value="54321" readonly>           
        </div>
	<div class="form-group">
            <label for="costo">COSTO UNITARIO:</label>
	    <input type="text" id="costo" value="00000" readonly>            
        </div>
        <h1></h1>
	<div>
		<button type="button" onclick="enviarDatos(); obtenerDatos()">GUARDAR: </button>
		<button onclick="location.href='404.html'">CANCELAR</button>
	</div>
</div>
</div>

<p id="mensaje"></p>

    <script>
        function enviarDatos() {
            var formData = new FormData(document.getElementById('formAgregarExistencia'));
            
            fetch('../php/entrada_prestamo.php', {
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

<script>    
    const today = new Date();
    const todayFormatted = today.getFullYear() + '-' + 
                          ('0' + (today.getMonth() + 1)).slice(-2) + '-' + 
                          ('0' + today.getDate()).slice(-2);        
    document.getElementById("fecha_prestamos").setAttribute("min", todayFormatted);
</script>

    </main>   
</body>
</html>