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
        <h1> REGISTRO DE ENTRADAS POR ALMACÉN </h1>	
    </header>

    <main>     
 
	<div class="form-container">   
            <label for="input-text">CÓDIGO: </label>
            <input type="text" id="input-text">		
            <button onclick="location.href='404.html'">ACEPTAR</button>
        </div>                     
<div class="main-container"> 
<div class="form-container_2">   
            <div class="form-group">
            <label for="no_almacen">No. ALMACÉN:  </label>
            <input type="text" id="no_almacen">
        </div>
        
        <div class="form-group">
            <label for="folio_almacen">FOLIO:     </label>
            <input type="text" id="folio_almacen">
        </div>
        
        <div class="form-group">
            <label for="no_vale_almacen">No. VALE: </label>
            <input type="text" id="no_vale_almacen">
        </div>
        
        <div class="form-group">
            <label for="fecha_almacen">FECHA: </label>            
	    <input type="date" id="fecha_almacen">
        </div>
        
        <div class="form-group">
            <label for="cantidad_almacen">CANTIDAD:</label>
            <input type="text" id="cantidad_almacen">
        </div>
</div> 

<div class="form-container_3"> 
	<div class="form-group">
            <label for="existencias_almacen">EXISTENCIAS A LA FECHA:</label>  
	    <input type="text" id="existencias_almacen" value="54321" readonly>          
        </div>
	<div class="form-group">
            <label for="descripcion_almacen">DESCRIPCIÓN:</label> 
	    <input type="text" id="descripcion_almacen" value="54321" readonly>           
        </div>
	<div class="form-group">
            <label for="costounitario_almacen">COSTO UNITARIO:</label>
	    <input type="text" id="costounitario_almacen" value="00000" readonly>            
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