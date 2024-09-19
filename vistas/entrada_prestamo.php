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
    <div class="cerrar" >
    <button name="cerrar_sesion"><img src="../img/cerrar_sesion.png" alt="cerrar sesion" id="cerrar"></button>
    </div>
    <h1></h1>
    <div class="regresar">
    <button name="regresar" onclick="window.history.back();"><img src="../img/regresar.png" alt="regresar" id="regresar"></button>
    </div>
    <main>
       		<div class="form-container">   
            <label for="input-text">CÓDIGO: </label>
            <input type="text" id="input-text">		
            <button onclick="location.href='404.html'">ACEPTAR</button>
        </div>                     
<div class="main-container"> 
<div class="form-container_2">   
            <div class="form-group">
            <label for="no_almacenprestamos">No. ALMACÉN:  </label>
            <input type="text" id="no_almacenprestamos">
        </div>
        
        <div class="form-group">
            <label for="folio_prestamos">FOLIO:     </label>
            <input type="text" id="folio_prestamos">
        </div>
        
        <div class="form-group">
            <label for="no_vale_prestamos">No. VALE: </label>
            <input type="text" id="no_vale_prestamos">
        </div>
        
        <div class="form-group">
            <label for="fecha_prestamos">FECHA: </label>            
	    <input type="date" id="fecha_prestamos">
        </div>
        
        <div class="form-group">
            <label for="cantidad_prestamos">CANTIDAD:</label>
            <input type="text" id="cantidad_prestamos">
        </div>

	<div class="form-group">
            <label for="observaciones_prestamos">OBSERVACIONES:</label>
            <input type="text" id="observaciones_prestamos">
        </div>
</div> 

<div class="form-container_3"> 
	<div class="form-group">
            <label for="existencias_prestamos">EXISTENCIAS A LA FECHA:</label>  
	    <input type="text" id="existencias_prestamos" value="54321" readonly>          
        </div>
	<div class="form-group">
            <label for="descripcion_prestamos">DESCRIPCIÓN:</label> 
	    <input type="text" id="descripcion_prestamos" value="54321" readonly>           
        </div>
	<div class="form-group">
            <label for="costounitario_prestamos">COSTO UNITARIO:</label>
	    <input type="text" id="costounitario_prestamos" value="00000" readonly>            
        </div>
        <h1></h1>
	<div>
		<button onclick="location.href='404.html'">GUARDAR	</button>
		<button onclick="location.href='404.html'">CANCELAR</button>
	</div>
</div>
</div>
    </main>   
</body>
</html>