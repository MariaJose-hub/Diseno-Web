<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Números Pares e Impares</title>
</head>
<body>

<h2>Escribe números separados por comas</h2>

<form method="POST">
    <input type="text" name="numeros" placeholder="Ej: 2, 5, 8, 11" required
    value="<?php echo isset($_POST['numeros']) ? htmlspecialchars($_POST['numeros']) : ''; ?>">
    <button type="submit">Verificar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $entrada = $_POST["numeros"] ?? "";
    $nums = array_filter(array_map('trim', explode(',', $entrada)), 'strlen');

    echo "<h3>Resultados:</h3>";

    foreach ($nums as $num) {
        if (is_numeric($num)) {
            if ($num % 2 == 0) {
                echo "El número $num es <strong>par</strong>.<br>";
            } else {
                echo "El número $num es <strong>impar</strong>.<br>";
            }
        } else {
            echo "El valor '$num' no es un número válido.<br>";
        }
    }
}
?>

</body>
</html>
