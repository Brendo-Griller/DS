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
//buscar todos os jogos registrados no banco de dados.
$buscar = "SELECT * FROM jogos";

// exec() = executa algo quando você não precisa receber registros de volta.
// query() = executa uma consulta quando voce quer receber dados de volta.
$stmt = $pdo-> query($buscar);

$jogos = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

    <h2>JOGOS CADASTRADOS</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Gênero</th>
            <th>Nota</th>
            <th>Ano</th>
        </tr>

        <?php foreach($jogos as $jogo) { ?>
            <tr>
                <tr><?= $jogo["id"]?></tr>
                <tr><?= $jogo["nome"]?></tr>
                <tr><?= $jogo["genero"]?></tr>
                <tr><?= $jogo["nota"]?></tr>
                <tr><?= $jogo["ano_lancamento"]?></tr>
            </tr>
            <?php } ?>
    </table>
</body>
</html>