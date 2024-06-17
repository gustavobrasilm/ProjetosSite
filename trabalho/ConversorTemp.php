<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Temperatura</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>CONVERSOR DE TEMPERATURA</h1>
    <form action="ConversorTemp.php" method="POST">
        <label for="temperatura">Temperatura:</label>
        <input type="number" id="temperatura" name="temperatura" step="0.01" required><br><br>

        <label for="unidadeOrigem">Converter de:</label>
        <select id="unidadeOrigem" name="unidadeOrigem" required>
            <option value="celsius">Celsius</option>
            <option value="fahrenheit">Fahrenheit</option>
        </select><br><br>

        <label for="unidadeDestino">Converter para:</label>
        <select id="unidadeDestino" name="unidadeDestino" required>
            <option value="celsius">Celsius</option>
            <option value="fahrenheit">Fahrenheit</option>
        </select><br><br>

        <input type="submit" value="Converter" class="converter-btn">
        <input type="submit" value="Voltar" onclick="window.location.href='index.php'" class="converter-btn">
    </form>

    <div class="resposta">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['temperatura']) && isset($_POST['unidadeOrigem']) && isset($_POST['unidadeDestino'])) {
                $temperatura = $_POST['temperatura'];
                $unidadeOrigem = $_POST['unidadeOrigem'];
                $unidadeDestino = $_POST['unidadeDestino'];

                $erro = empty($temperatura) ? "O campo temperatura é obrigatório" :
                    (!is_numeric($temperatura) ? "Por favor, insira um valor válido" : "");
                
                if ($erro) {
                    echo $erro;
                } else {
                    if ($unidadeOrigem == $unidadeDestino) {
                        $conversao = $temperatura;
                    } else {
                        if ($unidadeOrigem == "celsius" && $unidadeDestino == "fahrenheit") {
                            $conversao = ($temperatura * 9.0 / 5.0) + 32;
                        } elseif ($unidadeOrigem == "fahrenheit" && $unidadeDestino == "celsius") {
                            $conversao = ($temperatura - 32) * 5.0 / 9.0;
                        }
                    }

                    $conversao = number_format($conversao, 2);
                    echo "A temperatura convertida é: $conversao " . ucfirst($unidadeDestino);
                }
            } else {
                echo "Formulário não enviado corretamente";
            }
        }
        ?>
    </div>
</body>
</html>
