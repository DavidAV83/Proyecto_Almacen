<?php
session_start();

if (isset($_SESSION['usuario'])) {
    // La sesión ya está iniciada, redirige al usuario a la página de inicio
    header("Location: ./vistas/home.php");
    exit;
}

class Conexion {
    public $conexion;

    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "metro_cdmx";

        // Crea una conexión
        $this->conexion = new mysqli($servername, $username, $password, $dbname);
        $this->conexion->set_charset("utf8");

        // Verifica la conexión
        if ($this->conexion->connect_error) {
            die("La conexión falló: " . $this->conexion->connect_error);
        }
    }

    public function __destruct() {
        $this->conexion->close();
    }
}

// Crear instancia de la conexión
$db = new Conexion();
$conexion = $db->conexion;

if (isset($_POST["acep"])) {
    if (empty($_POST["expediente"])) {
        $mensaje = "EL CAMPO ESTÁ VACÍO";
    } else {
        $expediente = $_POST["expediente"];
        $sql = $conexion->query("SELECT * FROM personal_oficina WHERE expediente = '$expediente'");
        
        if ($sql && $datos = $sql->fetch_object()) {
            // Inicia la sesión
            session_start();
	    $_SESSION['usuario'] = $datos->expediente; // Guardar expediente
            $_SESSION['nombre'] = $datos->nombre; // Guardar nombre del usuario
            
            
             header("Location: ./vistas/home.php");
            header("Cache-Control: no-cache, no-store, must-revalidate");
            exit;
        } else {
            $mensaje = "No se encontró el expediente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Sistema de Control de Inventarios</title>
</head>
<body>
    <img src="img/logo.png" alt="Logo de la empresa" class="logo">
    <div class="login-container">
        <h1>Sistema de Control de Inventarios</h1>
        <form action="" method="POST">
            <label for="password">Inserte su clave:</label>
            <input type="password" id="expediente" name="expediente">
            <button type="submit" name="acep">INGRESAR</button>
        </form>
        <?php
        if (isset($mensaje)) {
            echo "<p>$mensaje</p>";
        }
        ?>
    </div>
</body>
</html>