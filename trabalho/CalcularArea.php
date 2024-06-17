<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculador de Área</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function mostrarCampos() {
            var forma = document.getElementById("forma").value;
            document.getElementById("Retangulo").style.display = (forma == "retangulo") ? "block" : "none";
            document.getElementById("Triangulo").style.display = (forma == "triangulo") ? "block" : "none";
            document.getElementById("Circulo").style.display = (forma == "circulo") ? "block" : "none";
        }
    </script>
</head>
<body>
    <h1>CALCULADOR DE ÁREA</h1>
    <form action="CalcularArea.php" method="POST">
        <label for="forma">Escolha a forma:</label>
        <select id="forma" name="forma" onchange="mostrarCampos()" required>
            <option value="">Selecione</option>
            <option value="retangulo">Retângulo</option>
            <option value="triangulo">Triângulo</option>
            <option value="circulo">Círculo</option>
        </select><br><br>

        <div id="Retangulo" style="display:none">
            <label for="largura">Largura:</label>
            <input type="number" id="largura" name="largura" step="0.01"><br><br>
            <label for="altura">Altura:</label>
            <input type="number" id="altura" name="altura" step="0.01"><br><br>
        </div>

        <div id="Triangulo" style="display:none">
            <label for="base">Base:</label>
            <input type="number" id="base" name="base" step="0.01"><br><br>
            <label for="alturaTriangulo">Altura do Triângulo:</label>
            <input type="number" id="alturaTriangulo" name="alturaTriangulo" step="0.01"><br><br>
        </div>

        <div id="Circulo" style="display:none">
            <label for="raio">Raio:</label>
            <input type="number" id="raio" name="raio" step="0.01"><br><br>
        </div>

        <input type="submit" value="Calcular">
        <input type="submit" value="Voltar" onclick="window.location.href='index.php'" class="converter-btn">
    </form>

    <div class="resposta">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $forma = $_POST['forma'];

            if ($forma == "retangulo") {
                $largura = $_POST['largura'];
                $altura = $_POST['altura'];
                if ($largura && $altura) {
                    $area = $largura * $altura;
                    echo "A área do retângulo é: " . number_format($area, 2) . " unidades²";
                } else {
                    echo "Por favor, preencha todos os campos.";
                }
            } elseif ($forma == "triangulo") {
                $base = $_POST['base'];
                $alturaTriangulo = $_POST['alturaTriangulo'];
                if ($base && $alturaTriangulo) {
                    $area = ($base * $alturaTriangulo) / 2;
                    echo "A área do triângulo é: " . number_format($area, 2) . " unidades²";
                } else {
                    echo "Por favor, preencha todos os campos.";
                }
            } elseif ($forma == "circulo") {
                $raio = $_POST['raio'];
                if ($raio) {
                    $area = pi() * pow($raio, 2);
                    echo "A área do círculo é: " . number_format($area, 2) . " unidades²";
                } else {
                    echo "Por favor, preencha todos os campos.";
                }
            } else {
                echo "Selecione uma forma válida.";
            }
        }
        ?>
    </div>
</body>
</html>
