<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./global.css">
    <title>Document</title>
</head>

<body>
    <?php
    echo "Otario:  " . $_POST['nome'] . "<br>";
    echo "CPF do otario:  " . $_POST['cpf'] . "<br> Se fudeu teu cu e meu \u{1F595}";
    echo "<hr> ";
    echo "" . var_dump($_POST) . "<br>";


    ?>

</body>

</html>