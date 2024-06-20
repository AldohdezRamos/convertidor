<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $decimal = intval($_POST["decimal"]);
        $conversion = $_POST["conversion"];
        $result = "";

        function decimal_to_binary($num) {
            $binary = '';
            while ($num > 0) {
                $binary = ($num % 2) . $binary;
                $num = intdiv($num, 2);
            }
            return $binary ? $binary : '0';
        }

        function decimal_to_octal($num) {
            $octal = '';
            while ($num > 0) {
                $octal = ($num % 8) . $octal;
                $num = intdiv($num, 8);
            }
            return $octal ? $octal : '0';
        }

        function decimal_to_hexadecimal($num) {
            $hex = '';
            $hex_chars = '0123456789ABCDEF';
            while ($num > 0) {
                $hex = $hex_chars[$num % 16] . $hex;
                $num = intdiv($num, 16);
            }
            return $hex ? $hex : '0';
        }

        switch ($conversion) {
            case "binary":
                $result = decimal_to_binary($decimal);
                break;
            case "octal":
                $result = decimal_to_octal($decimal);
                break;
            case "hexadecimal":
                $result = decimal_to_hexadecimal($decimal);
                break;
        }

        echo "<h2>Resultado: $result</h2>";
    }
    ?>
    



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertidor de Números</title>
</head>
<body>
    <h1>Convertidor de Números</h1>
    <form method="post">
        <label for="decimal">Ingrese un número decimal:</label>
        <input type="number" id="decimal" name="decimal" required>
        <br><br>
        <label for="conversion">Seleccione el tipo de conversión:</label>
        <select id="conversion" name="conversion">
            <option value="binary">Decimal a Binario</option>
            <option value="octal">Decimal a Octal</option>
            <option value="hexadecimal">Decimal a Hexadecimal</option>
        </select>
        <br><br>
        <button type="submit">Convertir</button>
    </form>

    </body>
</html>
