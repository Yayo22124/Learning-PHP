<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
    <!-- Conexion a la BD -->
    <?php include "./conexion.php" ?>

    <!-- HTNL principal -->
    <main class="container">
        <h1>Inicia Sesión</h1>
        <form method="post">
            <div class="form-control">
                <label for="nombre">Usuario</label>
                <input type="text" id="nombre" required>
            </div>
            <div class="form-control">
                <label for="contrasnia">Contraseña</label>
                <input type="password" id="contrasenia" required>
                <span>¿No tiene una cuenta? <a href="./registro.php">Registrate</a></span>
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </main>

    <!-- Envio de datos PHP -->
    <?php
        
    ?>
</body>
</html>