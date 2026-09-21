<?php
    $nome = "";
    $idade = 0;
    $resultado= "";
     
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["nome"];
        $idade = $_POST["idade"];
    }

    if ($idade > 18){
        $resultado = "sim";
    }else{
        $resultado = "não";

    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>nome:<?= $nome?></h1>
    <p>idade:<?= $idade?></p>
    <p>É maior de idade<?=$maior?></p>

    <form method="POST">

    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome" placeholder="Digite seu nome">
     
    <label for="idade">Idade</label>
    <input type="number" id="idade" name="idade" placeholder="Digite sua idade">

    <button type="submit">Enviar</button>
    </form>

    <?php if ($resultado != "") { ?>
      <div class="res">
        <p>Seu nome é <?= $nome ?> e tem <?= $idade ?> anos.
            <br>
         Você é maior de idade?: <?= $resultado ?>
        </p>

       </div>
    <?php } ?>
</body>
</html>