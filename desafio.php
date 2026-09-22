<!-- index.php -->
<?php
$nome = "";
$idade = 0;
$media = 0;
$situação = "";
$classe_status = "";
$erro = "";
$pontos_faltantes = 0;
$frequencia = 0;

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["nome"])) {
    
    $nome = $_GET["nome"];
    $idade = (int)$_GET["idade"];
    $frequencia = (float)$_GET["frequencia"];

    $nota1 = (float)($_GET["nota1"] ?? 0);
    $nota2 = (float)($_GET["nota2"] ?? 0);
    $nota3 = (float)($_GET["nota3"] ?? 0);
    $nota4 = (float)($_GET["nota4"] ?? 0);
    $nota5 = (float)($_GET["nota5"] ?? 0);

    if ($idade <= 0) {
        $erro = "A idade deve ser maior que 0.";
    } elseif (
        $nota1 < 0 || $nota1 > 10 ||
        $nota2 < 0 || $nota2 > 10 ||
        $nota3 < 0 || $nota3 > 10 ||
        $nota4 < 0 || $nota4 > 10 ||
        $nota5 < 0 || $nota5 > 10
    ) {
        $erro = "As notas devem estar entre 0 e 10.";
    } elseif ($frequencia < 0 || $frequencia > 100) {
        $erro = "A frequência deve estar entre 0% e 100%.";
    } else {
        $media = (($nota1 * 2) + ($nota2 * 3) + ($nota3 * 1) + ($nota4 * 1) + ($nota5 * 3)) / 10;

        if ($frequencia < 75) {
            $situação = "Reprovado por Frequência";
            $classe_status = "reprovado-freq";
        } elseif ($media == 10) {
            $situação = "Aprovado com Excelência";
            $classe_status = "excelencia";
        } elseif ($media >= 7) {
            $situação = "Aprovado";
            $classe_status = "aprovado";
        } elseif ($media >= 5 && $media < 7) {
            $situação = "Recuperação";
            $classe_status = "recuperacao";
        } else {
            $situação = "Reprovado";
            $classe_status = "reprovado";
        }

        if ($media < 7) {
            $pontos_faltantes = 7 - $media;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="desafio.css">
    <title>Boletim Escolar</title>
</head>
<body>
    <div class="container">
        <h2>Boletim Escolar</h2>

        <?php if ($erro != "") { ?>
            <div class="erro-msg">
                <?= $erro ?>
            </div>
        <?php } ?>

        <form method="GET">
            <label for="nome">Nome do Aluno</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>

            <label for="idade">Idade</label>
            <input type="number" id="idade" name="idade" placeholder="Digite sua idade" min="1" required>

            <label for="frequencia">Frequência (%)</label>
            <input type="number" id="frequencia" name="frequencia" placeholder="Ex: 85" min="0" max="100" required>

            <label for="nota1">Nota 1 (Peso 2)</label>
            <input type="number" id="nota1" name="nota1" min="0" max="10" step="0.1" placeholder="Nota de 0 a 10" required>

            <label for="nota2">Nota 2 (Peso 3)</label>
            <input type="number" id="nota2" name="nota2" min="0" max="10" step="0.1" placeholder="Nota de 0 a 10" required>
            
            <label for="nota3">Nota 3 (Peso 1)</label>
            <input type="number" id="nota3" name="nota3" min="0" max="10" step="0.1" placeholder="Nota de 0 a 10" required>

            <label for="nota4">Nota 4 (Peso 1)</label>
            <input type="number" id="nota4" name="nota4" min="0" max="10" step="0.1" placeholder="Nota de 0 a 10" required>

            <label for="nota5">Nota 5 (Peso 3)</label>
            <input type="number" id="nota5" name="nota5" min="0" max="10" step="0.1" placeholder="Nota de 0 a 10" required>
            
            <button type="submit">Calcular Média</button>
        </form>

        <?php if ($situação != "" && $erro == "") { ?>
            <div class="resultado">
                <p><strong>Nome do Aluno:</strong> <?= htmlspecialchars($nome) ?></p>
                <p><strong>Idade:</strong> <?= $idade ?> anos</p>
                <p><strong>Frequência:</strong> <?= $frequencia ?>%</p>
                <p><strong>Média Final:</strong> <?= number_format($media, 1, ',', '.') ?></p>
                
                <p><strong>Situação:</strong> <span class="status <?= $classe_status ?>"><?= $situação ?></span></p>

                <?php if ($pontos_faltantes > 0) { ?>
                    <p class="pontos-faltantes">
                        ⚠ Faltaram <?= number_format($pontos_faltantes, 1, ',', '.') ?> pontos para atingir a média 7.0.
                    </p>
                <?php } ?>
            </div>
        <?php } ?>

        <a href="index.php" class="btn-voltar">Limpar / Voltar ao Início</a>
    </div>
</body>
</html>