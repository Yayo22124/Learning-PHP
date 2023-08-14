<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- links -->
    <link rel="shortcut icon"
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1200px-PHP-logo.svg.pngs"
        type="image/x-icon">
    <link rel="stylesheet" href="styles.css">

    <!-- Objetivo de la práctica: Crear una calculadora básica en línea utilizando formularios y funciones PHP. -->
    
    <title>Calculadora PHP</title>
    </head>
    
    <body>
    <!-- PHP -->
    <?php
    // Verifica si el formulario ha sido enviado mediante el método POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtiene el valor del primer número ingresado
        $num1 = $_POST["num1"];
        // Obtiene el valor del segundo número ingresado
        $num2 = $_POST["num2"];
        // Obtiene el operador ingresado
        $operador = $_POST["operador"];

        // Validar operación en base al operador
        if ($operador == "suma") {
            $resultado = $num1 + $num2;
        } elseif ($operador == "resta") {
            $resultado = $num1 - $num2;
        } elseif ($operador == "multiplicacion") {
            $resultado = $num1 * $num2;
        } elseif ($operador == "division") {
            if ($num2 != 0) {
                $resultado = $num1 / $num2;
            } else {
                $resultado = "Error: División por cero.";
            }
        }
    }
    ?>
    <!-- HTML DOM -->
    <main class="container">
        <h1>Calculadora Básica en PHP</h1>
        <span class="resultado">
            <?php echo $resultado; ?>
        </span>
        <form method="post">
            <input type="number" name="num1" id="Numero1" placeholder="Número 1" required>
            <select name="operador" id="operador">
                <option value="suma">+</option>
                <option value="resta">-</option>
                <option value="multiplicacion">x</option>
                <option value="division">/</option>
            </select>
            <input type="number" name="num2" id="Numero2" placeholder="Número 2" required>
            <button type="submit">Calcular</button>

        </form>
    </main>


</body>

</html>