<?php
session_start(); // Iniciar la sesión

include '../index.php'; // Incluye la clase de conexión

if (isset($_POST['clave'])) {
    $clave = $_POST['clave'];

    // Crear una instancia de la clase Conexion
    $conexion = new Conexion();
    $mysqli = $conexion->getConexion(); // Obtener la conexión

    // Consulta para verificar si la clave existe en la base de datos
    $query = "SELECT expediente FROM personal_oficina WHERE expediente = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $clave);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Si el expediente existe, iniciar sesión
        $_SESSION['loggedin'] = true;
        $_SESSION['clave'] = $clave;
        header('Location: ../vistas/home.php');
        exit();
    } else {
        // Si el expediente no existe, establecer el mensaje de error en la sesión
        $_SESSION['login_error'] = 'Clave incorrecta.';
        header('Location: ../index.php');
        exit();
    }

    $stmt->close();
    $mysqli->close();
} else {
    echo "Debe ingresar una clave.";
}
?>
