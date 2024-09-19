<?php
session_start();
class Conexion
{
    private $conexion;  // Marcamos la conexión como privada para evitar accesos externos

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "david123";
        $dbname = "metro_cdmx";

        // Crea una conexión
        $this->conexion = new mysqli($servername, $username, $password, $dbname);
        $this->conexion->set_charset("utf8");

        // Verifica la conexión
        if ($this->conexion->connect_error) {
            die("La conexión falló: " . $this->conexion->connect_error);
        }
    }

    // Método para obtener la conexión
    public function getConexion()
    {
        return $this->conexion;
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
        <form action="php/login.php" method="POST">
            <label for="clave">Inserte su clave:</label>
            <input type="password" id="clave" name="clave">
            <?php if (isset($_SESSION['login_error'])): ?>
            <p class="error-message"><?php echo $_SESSION['login_error']; ?></p>
            <?php unset($_SESSION['login_error']); // Limpiar el mensaje de error después de mostrarlo ?>
        <?php endif; ?>
            <button type="submit">INGRESAR</button>
        </form>
    </div>
</body>
</html>