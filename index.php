<?php

require "conexao.php";

echo "<br>Meu sistema está conectado";

$sql = "CREATE TABLE IF NOT EXISTS teste (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR (100),
idade INT
)";

$pdo -> exec($sql);

echo "<br>Tabela criada com sucesso!";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
      <li><a href="idade.php"> Validação de Idade</a></li>
      <li><a href="nota.php">Notas</a></li>
      <li><a href="desafio.php">Desafio</a></li>
      <li><a href="login-basico.php">Login-Basico</a></li>
    </ul>
</body>
</html>