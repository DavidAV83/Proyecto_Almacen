<?php
session_start();
include 'conexion.php';

if (isset($_SESSION['usuario']) && isset($_SESSION['nombre'])) {
    $expediente_usuario = $_SESSION['usuario'];
    $nombre_usuario = $_SESSION['nombre'];
    $codigo = $_SESSION['codigo'] ?? null;        
    $almacen = $_POST['no_almacenprestamos'] ?? null;
    $folio = $_POST['folio_prestamos'] ?? null;    
    $fecha_almacen = $_POST['fecha_prestamos'] ?? null;
    $cantidad_entrada = $_POST['cantidad_prestamos'] ?? null;        
    $observaciones= $_POST['observaciones_prestamos'] ?? null;        
    $no_vale = $_POST['no_vale_prestamos'] ?? null;     
    $entradalma="A";  
    $entrada="E"; 
    $cajachica="C";
    $presta="P";
    $existenciaFin=0;        

if ($codigo = $_SESSION['codigo']) {   
    
    $sql = "SELECT EXISTENCIA, DESCRIPCIO, COSTO, UNI_MED, CANSAL, FECHASAL, FECHA, CATEGO, FOLIO, CANTIDAD, COSTO, FACTURA, OBSERVA, ESTABLE, NO_VALE, SECC FROM histor WHERE CODIGO = '$codigo' ORDER BY ID DESC LIMIT 1";

    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {       
        $fila = $resultado->fetch_assoc();              
	$existencia = $fila['EXISTENCIA'];
	$costo = $fila['COSTO'];
	$descripcion = $fila['DESCRIPCIO'];
	$uni_med = $fila['UNI_MED'];
	$cansal = $fila['CANSAL'];
	$establecimiento = $fila['ESTABLE'];
	$factura = $fila['FACTURA'];
	$fechasal = $fila['FECHASAL'];
	$fecha= $fila['FECHA'];
	$catego = $fila['CATEGO'];		
	$costo = $fila['COSTO'];			
	$secc = $fila['SECC'];	
	$existenciaFin=$cantidad_entrada+$existencia;
    } else {        
        echo "No se encontraron datos para el código: $codigo";
    }

$codigo = !empty($codigo) ? $codigo : 0;
$descripcion = !empty($descripcion) ? $descripcion : 0;
$uni_med = !empty($uni_med) ? $uni_med : 0;
$cantidad_entrada = !empty($cantidad_entrada) ? $cantidad_entrada : 0;
$fecha_almacen = !empty($fecha_almacen) ? $fecha_almacen : 0;
$no_vale = !empty($no_vale) ? $no_vale : 0;
$cansal = !empty($cansal) ? $cansal : 0;
$fechasal = !empty($fechasal) ? $fechasal : 0;
$fecha = !empty($fecha) ? $fecha : 0;
$existenciaFin = !empty($existenciaFin) ? $existenciaFin : 0;
$almacen = !empty($almacen) ? $almacen : 0;
$cajachica = !empty($cajachica) ? $cajachica : 0;
$entrada = !empty($entrada) ? $entrada : 0;
$expediente_usuario = !empty($expediente_usuario) ? $expediente_usuario : 0;
$nombre_usuario= !empty($nombre_usuario) ? $nombre_usuario : 0;
$catego = !empty($catego) ? $catego : 0;
$folio = !empty($folio) ? $folio : 0;
$cantidad = !empty($cantidad) ? $cantidad : 0;
$costo = !empty($costo) ? $costo : 0;
$factura = !empty($factura) ? $factura : 0;
$observaciones = !empty($observaciones) ? $observaciones : 0;
$establecimiento = !empty($establecimiento) ? $establecimiento : 0;
$secc = !empty($secc) ? $secc : 0;

$conn->autocommit(TRUE);
$sql = "INSERT INTO histor (
    CODIGO, DESCRIPCIO, UNI_MED, CANENT, FECHAENT, CANSAL, FECHASAL, FECHA,
    EXISTENCIA, NO_VALE, ALMACEN, PRESTA, ENTRADA, NUMEXP, NOMBRE, 
    CATEGO, FOLIO, CANTIDAD, COSTO, FACTURA, OBSERVA, ESTABLE, SECC
) VALUES (
    '$codigo', '$descripcion', '$uni_med', '$cantidad_entrada', '$fecha_almacen', 
    '$cansal', '$fechasal', '$fecha', '$existenciaFin', '$no_vale', '$almacen', 
    '$presta', '$entrada', '$expediente_usuario', '$nombre_usuario', 
    '$catego', " . ($folio ?: "NULL") . ", " . ($cantidad ?: "NULL") . ", " . ($costo ?: "NULL") . ", 
    '$factura', '$observaciones', '$establecimiento', '$secc'
)";


if ($conn->query($sql) === TRUE) {
    echo "Datos insertados exitosamente.";	
$result = $conn->query("SELECT * FROM histor WHERE CODIGO = '$codigo'");
if ($result->num_rows > 0) {
    echo "El registro se ha insertado correctamente.";
} else {
    echo "El registro no fue encontrado en la base de datos.";
}

} else {
    echo "Error al insertar datos en histor: " . $conn->error;
}


} else {
    echo "No se ha proporcionado un código.";
}

} else {
    echo "No se ha iniciado sesión.";
}

$conn->close();
?>