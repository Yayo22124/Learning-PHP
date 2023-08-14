<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="stylesheet" href="styles.css">
    <title>Registro</title>
</head>

<body>
    <!-- Conexion a la BD -->
    <?php include "./conexion.php" ?>

    <!-- Envio de datos PHP -->
    <?php
    // Obtener datos del Formularios
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener Nombre
        $nombre = $_POST["nombre"];
        // Obtener Correo
        $correo = $_POST["correo"];
        // Obtener Contraseña
        $passwd = $_POST["contrasenia"];

        // Encriptar la contraseña
        $hash_passwd = password_hash($passwd, PASSWORD_DEFAULT);

        $consulta_correo = "SELECT COUNT(*) AS total FROM tbb_usuarios WHERE Correo = '$correo'";
        $resultado_consulta = $conn->query($consulta_correo);

        if ($resultado_consulta) {
            $fila = $resultado_consulta->fetch_assoc();
            $total = $fila["total"];

            if ($total > 0) {
                echo "Ya existe una cuenta con este correo. Por favor, elige otro correo.";
            } else {
                // consulta SQL para registrar los datos
                $sql = "INSERT INTO tbb_usuarios (Nombre, Correo, Passwd) VALUES ('$nombre', '$correo', '$hash_passwd')";



                // Verificar consulta
                if ($conn->query($sql) === TRUE) {
                    header("Location: login.php"); // Redirigir a la página de confirmación
                    $resultado = true;
                    exit;
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    $resultado = false;
                }
            }
        } else {
            echo "Error en la consulta: " . $conn->error;
        }

        $conn->close();

    }

    ?>
    <!-- HTNL principal -->
    <main class="container">
        <h1>Registrate</h1>
        <form method="post">
            <div class="form-control">
                <label for="nombre">Usuario</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-control">
                <label for="correo">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            <div class="form-control">
                <label for="contrasenia">Contraseña</label>
                <input type="password" id="contrasenia" name="contrasenia" required>
                <span>¿Ya tiene una cuenta? <a href="./login.php">Inicia Sesión</a></span>
            </div>
            <button type="submit">Registrarse</button>
        </form>

    </main>

</body>

<script>
    window.onload = function () {
        document.getElementById("nombre").value = "";
        document.getElementById("correo").value = "";
        document.getElementById("contrasenia").value = "";
    }
</script>

</html>