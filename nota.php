<?php
$nome = "";
$idade = 0;
$media = 0;
$situação = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];

    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $nota3 = $_POST["nota3"];
    $nota4 = $_POST["nota4"];
    $nota5 = $_POST["nota5"];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST"></form>
    <label for="nome"></label>
    <input type="text" id="nome" name="nome" placeholder="Digite seu nome">
    <br><br>

    <label for="idade">Idade</label>
    <input type="number" id="idade" name="idade" placeholder="Digite sua idade">
    <br><br>

    <label for="nota1">Idade</label>
    <input type="number" id="nota1" name="nota1" min=0 max=10 placeholder="Digite sua idade">
    <br><br>

    <label for="nota2">Idade</label>
    <input type="number" id="nota2" name="nota2" min=0 max=10 placeholder="Digite sua idade">
    <br><br>
    
    <label for="nota3">Idade</label>
    <input type="number" id="nota3" name="nota3" min=0 max=10 placeholder="Digite sua idade">
    <br><br>

    <label for="nota4">Idade</label>
    <input type="number" id="nota4" name="nota4" min=0 max=10 placeholder="Digite sua idade">
    <br><br>

    <label for="nota5">Idade</label>
    <input type="number" id="nota5" name="nota5" min=0 max=10 placeholder="Digite sua idade">
    <br><br>

    <label for="nota"></label>
</body>
</html>