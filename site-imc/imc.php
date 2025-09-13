<?php
// Recebe os dados do formulário
$nome   = $_POST['nome'] ?? '';
$peso   = $_POST['peso'] ?? 0;
$altura = $_POST['altura'] ?? 0;

// Calcula o IMC
$imc = 0;
$classificacao = "";

if ($peso > 0 && $altura > 0) {
    $imc = $peso / ($altura * $altura);

    if ($imc < 18.5) {
        $classificacao = "Abaixo do peso";
    } elseif ($imc < 24.9) {
        $classificacao = "Peso normal";
    } elseif ($imc < 29.9) {
        $classificacao = "Sobrepeso";
    } elseif ($imc < 34.9) {
        $classificacao = "Obesidade Grau I";
    } elseif ($imc < 39.9) {
        $classificacao = "Obesidade Grau II";
    } else {
        $classificacao = "Obesidade Grau III (mórbida)";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado IMC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .resultado {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            width: 380px;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        p {
            font-size: 16px;
            margin: 10px 0;
            color: #444;
        }
        .imc {
            font-size: 22px;
            font-weight: bold;
            color: #007bff;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 15px;
            background: #007bff;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
        }
        a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="resultado">
        <h2>Resultado do IMC</h2>
        <p><strong>Nome:</strong> <?= htmlspecialchars($nome) ?></p>
        <p><strong>Peso:</strong> <?= $peso ?> kg</p>
        <p><strong>Altura:</strong> <?= $altura ?> m</p>
        <p class="imc">IMC: <?= number_format($imc, 2) ?></p>
        <p><strong>Classificação:</strong> <?= $classificacao ?></p>
        <a href="index.html">Calcular novamente</a>
    </div>
</body>
</html>