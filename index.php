<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "Bom dia caralho \u{1F595}";
    ?>
    <form action="dados.php" method="post">
        <label for="">Digite seu nome:</label>
        <input type="text" name="nome" id="nome">
        <label for="">Digite seu cpf:</label>
        <input type="number" name="cpf" id="cpf">
        <input type="submit" value="Enviar">
    </form>

</body>

</html>