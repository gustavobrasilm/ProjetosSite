<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rifa PHP</title>
    <link rel="stylesheet" href="rifa.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Open+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://static.lojadointer.com.br/produtos/jaqueta-internacional-2425-adidas-masculina/06/FB8-4787-006/FB8-4787-006_zoom1.jpg?ts=1694762630?ims=1088x" rel="stylesheet">
</head>

<body class="css-selector">
    <?php
    $premio = "Casaco Internacional 24/25";
    $valor = "R$ 10,00";
    $imagem = "https://static.lojadointer.com.br/produtos/jaqueta-internacional-2425-adidas-masculina/06/FB8-4787-006/FB8-4787-006_zoom1.jpg?ts=1694762630?ims=1088x";
    echo "<h1>Ação entre amigos - CSL</h1>";
    echo "<div class='headerTitle'>";
    echo "<h2 class='subtitulo'>Quantas rifas gerar: </h2>";
    echo "<div class='head'>";

    echo "<form action='rifa.php' method='get'>";
    echo "<input type='number' placeholder='Digite a quantidade' min='1' max='9999' maxlength=4 name='valor' required/>";
    echo "<button type='submit'>Gerar Rifas</button>"; 
    echo "</form>";
    echo "<form action='index.php' method='get'>";
    echo "<button type='submit'>Voltar ao Índice</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";

    if (isset($_GET['valor']) && !empty($_GET['valor'])) {
        $numero = 1;
        $quantidade = (int) $_GET['valor'];
        while ($numero <= $quantidade) {
            echo "<table>
        <tr>
            <td class='dados'>
                <p class='number'><b>Nº ";
            echo str_pad($numero, 4, '0', STR_PAD_LEFT);
            echo "</b></p>
                <p>Nome: ______________________________</p>
                <p>Telefone: ____________________________</p>
                <p>Email: ______________________________</p>
            </td>
            
            <td class='premio'>
                <h2 >Ação entre amigos - CSL</h2>
                <p>$premio</p>
                <p>Valor: $valor</p>
                <p><b>Nº ";
            echo str_pad($numero, 4, '0', STR_PAD_LEFT);
            echo "</b></p>
            </td>
            <td>
                <img src='$imagem' alt='foto' class='foto' />
            </td>
        </tr></table>";
            $numero++;
        }
    }
    ?>
</body>

</html>
