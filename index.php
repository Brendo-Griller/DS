<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nome= "Brendo";
    $idade= 30;
     
    if ($nome > 18){
        $maior = "sim, é maior de idade";
    }else{
        $maior = "não, é de maior";

    }

    ?>
    <h1>nome:<?= $nome?></h1>
    <p>idade:<?= $idade?></p>
    <p>É maior de idade<?=$maior?></p>
</body>
</html>