<?php
session_start(); // Iniciar sesión

include 'conexion.php';
if (isset($_SESSION['usuario']) && isset($_SESSION['nombre'])) {   

if ($expediente = $_POST['expediente_us']) {         
    $sql = "SELECT COUNT(*) as count FROM histor WHERE CAST(NUMEXP AS DECIMAL(10, 2)) = '$expediente'";    

    $resultado = $conn->query($sql);  

   if ($resultado) {
        $row = $resultado->fetch_assoc();

        if ($row['count'] > 0) {
            echo "El expediente ya existe. No se puede agregar uno duplicado.";
        } else {
	    $nombre_us = $_POST['nombre_us'];
	    $categoria_us = $_POST['categoria_us'];
	    if (empty($nombre_us)) {
     		   echo "Error: El campo nombre es obligatorio.";
	    }
	    if (empty($categoria_us)) {
     		   echo "Error: El campo categoria es obligatorio.";
	    }	    else{	   

	    $sql_insert = "INSERT INTO histor (NUMEXP, NOMBRE, CATEGO) VALUES ('$expediente', '$nombre_us', '$categoria_us')";

		if ($conn->query($sql_insert) === TRUE) {
		    echo "Expediente agregado correctamente.";
		} else {
		    echo "Error al agregar el expediente: " . $conn->error;
		}
	      }

        }
    } else {
        echo "Error al verificar el expediente: ";
    }


} else {
    echo "No se ha proporcionado un código.";
}

} else {
    echo "No se ha iniciado sesión.";
}

$conn->close();
?>