<?php
$nome = "";
$idade = 0;
$media = 0;
$situação = "";
$classe_status = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["nome"])) {
    
    $nome = $_GET["nome"];
    $idade = $_GET["idade"];

    $nota1 = $_GET["nota1"] ?? 0;
    $nota2 = $_GET["nota2"] ?? 0;
    $nota3 = $_GET["nota3"] ?? 0;
    $nota4 = $_GET["nota4"] ?? 0;
    $nota5 = $_GET["nota5"] ?? 0;

    $media  = (
        ($nota1 * 2) + ($nota2 * 3) + ($nota3 * 1) + ($nota4 * 1) + ($nota5 * 3)
    )/10;

    if ($media >= 7) {
        $situação = "Aprovado";
        $classe_status = "aprovado";
    } elseif ($media >= 5 && $media < 7) {
        $situação = "Recuperação";
        $classe_status = "recuperacao";
    } else {
        $situação = "Reprovado";
        $classe_status = "reprovado";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="desafio.css">
    <title>Cálculo de Média</title>
</head>
<body>
    <div class="container">
        <h2>Boletim Escolar</h2>
        <form method="GET">
            <label for="nome">Nome do Aluno</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>

            <label for="idade">Idade</label>
            <input type="number" id="idade" name="idade" placeholder="Digite sua idade" required>

            <label for="nota1">Nota 1 (Peso 2)</label>
            <input type="number" id="nota1" name="nota1" min="0" max="10" step="0.1" placeholder="Digite a nota 1" required>

            <label for="nota2">Nota 2 (Peso 3)</label>
            <input type="number" id="nota2" name="nota2" min="0" max="10" step="0.1" placeholder="Digite a nota 2" required>
            
            <label for="nota3">Nota 3 (Peso 1)</label>
            <input type="number" id="nota3" name="nota3" min="0" max="10" step="0.1" placeholder="Digite a nota 3" required>

            <label for="nota4">Nota 4 (Peso 1)</label>
            <input type="number" id="nota4" name="nota4" min="0" max="10" step="0.1" placeholder="Digite a nota 4" required>

            <label for="nota5">Nota 5 (Peso 3)</label>
            <input type="number" id="nota5" name="nota5" min="0" max="10" step="0.1" placeholder="Digite a nota 5" required>
            
            <button type="submit">Calcular Média</button>
        </form>

        <?php if ($situação != "") { ?>
            <div class="resultado">
                <p><strong>Nome do Aluno:</strong> <?= htmlspecialchars($nome) ?></p>
                <p><strong>Idade:</strong> <?= htmlspecialchars($idade) ?> anos</p>
                <p><strong>Notas:</strong> <?= $nota1 ?> | <?= $nota2 ?> | <?= $nota3 ?> | <?= $nota4 ?> | <?= $nota5 ?></p>
                <p><strong>Média Final:</strong> <?= number_format($media, 1, ',', '.') ?></p>
                <p><strong>Situação:</strong> <span class="status <?= $classe_status ?>"><?= $situação ?></span></p>
            </div>
        <?php } ?>

        <a href="index.php" class="btn-voltar">Voltar ao Início</a>
    </div>
</body>
</html>