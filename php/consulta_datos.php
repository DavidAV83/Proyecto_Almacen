<?php
include 'conexion.php';
session_start();
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];    
    $sql = "SELECT EXISTENCIA, DESCRIPCIO, COSTO FROM histor WHERE CODIGO = '$codigo' ORDER BY GREATEST(FECHAENT, FECHASAL) DESC LIMIT 1";

    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {       
        $fila = $resultado->fetch_assoc();
                
        echo json_encode([
            "existencia" => $fila['EXISTENCIA'],
            "descripcion" => $fila['DESCRIPCIO'],
            "costo" => $fila['COSTO']	    
        ]);
	$existencia = $fila['EXISTENCIA'];
    } else {        
        echo json_encode([
            "error" => "No se encontraron datos para el código: $codigo"
        ]);
    }
} else {
    echo json_encode(["error" => "No se ha proporcionado un código."]);
}
$_SESSION['codigo'] = $codigo;
$_SESSION['existencia'] = $existencia;
$conn->close();
?>
