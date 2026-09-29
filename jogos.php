<?php
require 'conexao.php';

$sqlTabela = "CREATE TABLE IF NOT EXISTS jogos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    genero VARCHAR(50),
    nota INT,
    ano_lancamento INT
)";
$pdo->exec($sqlTabela);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $nota = $_POST["nota"];
    $ano_lancamento = $_POST["ano_lancamento"];

    $sqlInsert = "INSERT INTO jogos (nome, genero, nota, ano_lancamento) VALUES ('$nome', '$genero', $nota, $ano_lancamento)";
    $pdo->exec($sqlInsert);
    
    echo "<p class='mensagem'>Jogo cadastrado com sucesso!</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Jogos</title>
    <link rel="stylesheet" href="jogos.css">
</head>
<body>
    <h2>Cadastrar Novo Jogo</h2>
    
    <form method="POST" action="">
        <label for="nome">Nome do jogo:</label>
        <input type="text" name="nome" id="nome" required>
        
        <label for="genero">Gênero:</label>
        <input type="text" name="genero" id="genero" required>
        
        <label for="nota">Nota:</label>
        <input type="number" name="nota" id="nota" required>
        
        <label for="ano_lancamento">Ano de lançamento:</label>
        <input type="number" name="ano_lancamento" id="ano_lancamento" required>
        
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>