<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>CONVERSOR DE MOEDAS</h1>
    <form action="conversorMoe.php" method="POST">
        <label for="valor">Valor:</label>
        <input type="number" id="valor" name="valor" step="0.01" required><br><br>

        <label for="moedaOrigem">Converter de:</label>
        <select id="moedaOrigem" name="moedaOrigem" required>
            <option value="real">Real</option>
            <option value="dolar">Dólar</option>
            <option value="euro">Euro</option>
        </select><br><br>

        <label for="moedaDestino">Converter para:</label>
        <select id="moedaDestino" name="moedaDestino" required>
            <option value="real">Real</option>
            <option value="dolar">Dólar</option>
            <option value="euro">Euro</option>
        </select><br><br>

        <input type="submit" value="Converter">
        <input type="submit" value="Voltar" onclick="window.location.href='index.php'" class="converter-btn">
    </form>

    <div class="resposta">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['valor']) && isset($_POST['moedaOrigem']) && isset($_POST['moedaDestino'])) {
                $valor = $_POST['valor'];
                $moedaOrigem = $_POST['moedaOrigem'];
                $moedaDestino = $_POST['moedaDestino'];

                $erro = empty($valor) ? "O campo valor é obrigatório" :
                    (!is_numeric($valor) || $valor <= 0 ? "Por favor, insira um valor válido" : "");
                
                if ($erro) {
                    echo $erro;
                } else {
                    $taxasConversao = [
                        "real" => ["real" => 1, "dolar" => 1/5.38, "euro" => 1/5.38*0.93],
                        "dolar" => ["real" => 5.38, "dolar" => 1, "euro" => 0.93],
                        "euro" => ["real" => 5.38/0.93, "dolar" => 1/0.93, "euro" => 1]
                    ];

                    if (isset($taxasConversao[$moedaOrigem][$moedaDestino])) {
                        $conversao = $valor * $taxasConversao[$moedaOrigem][$moedaDestino];
                        $conversao = number_format($conversao, 2);
                        echo "O valor convertido é: $conversao " . ucfirst($moedaDestino);
                    } else {
                        echo "Conversão não disponível";
                    }
                }
            } else {
                echo "Formulário não enviado corretamente";
            }
        }
        ?>
    </div>
</body>
</html>
