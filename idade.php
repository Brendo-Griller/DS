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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>