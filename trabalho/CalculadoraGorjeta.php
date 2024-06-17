<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>CALCULADORA DE GORJETA</h1>
    <form action="calculadoraGorjeta.php" method="POST">
        <label for="valor"> Valor da Conta (R$): </label>
        <input type="number" id = "valor" name="valor"
        step="0.1" required > <br><br>
        <label for="porcentagem" >Porcentagem da Gorjeta (%): </label>
        <input type="number" id = "porcentagem" name="porcentagem"
        step="0.01" required > <br><br>
        <input type="submit" value = "Calcular">
        <input type="submit" value="Voltar" onclick="window.location.href='index.php'" class="converter-btn">
    </form>
    <div class="Resposta">
        <?php
        if ($_SERVER ['REQUEST_METHOD'] == "POST"){
            if (isset($_POST['valor']) && isset($_POST['porcentagem'])){
                $valor= $_POST['valor'];
                $porcentagem= $_POST['porcentagem'];

                $erro= empty($valor) || empty($porcentagem) ? "todos os campos são obrigatórios":
                ((!is_numeric($porcentagem) || $valor <=0 || $porcentagem <=0) ? " Por favor, insira valores válidos": "");
                if ($erro) {
                    echo $erro;
                } else {
                    $valorGorjeta = ($valor * $porcentagem) / 100;
                    $valorGorjeta = number_format($valorGorjeta,2);
                    echo "O valor da gorjeta é de R$: $valorGorjeta";
                }} else {echo "Formulário não enviado corretamente";}}?>
        
    </div>
</body>
</html>