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
        <h1> REGISTRO DE ENTRADAS POR CAJA CHICA </h1>	
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
            <label for="folio_cajachica">FOLIO:     </label>
            <input type="text" id="folio_cajachica">
        </div>
        
        <div class="form-group">
            <label for="fecha_cajachica">FECHA: </label>            
	    <input type="date" id="fecha_cajachica">
        </div>
        
        <div class="form-group">
            <label for="cantidad_cajachica">CANTIDAD: </label>
            <input type="text" id="cantidad_cajachica">
        </div>
        
        <div class="form-group">
            <label for="establecimiento_cajachica">ESTABLECIMIENTO:</label>
            <input type="text" id="establecimiento_cajachica">
        </div>

	<div class="form-group">
            <label for="factura_cajachica">FACTURA:</label>
            <input type="text" id="factura_cajachica">
        </div>

	<div class="form-group">
            <label for="observaciones_cajachica">OBSERVACIONES:</label>
            <input type="text" id="observaciones_cajachica">
        </div>
</div> 

<div class="form-container_3"> 
	<div class="form-group">
            <label for="existencias_cajachica">EXISTENCIAS A LA FECHA:</label>  
	    <input type="text" id="existencias_cajachica" value="54321" readonly>          
        </div>	
	<div class="form-group">
            <label for="costounitario_cajachica">COSTO UNITARIO:</label>
	    <input type="text" id="costounitario_cajachica" value="00000" readonly>            
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