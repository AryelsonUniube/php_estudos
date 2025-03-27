<?php include("autenticacao.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/style.css">

    <title>Document</title>
</head>

<body>
    <div class="body">
        <div class="haeder">
            <div class="name"><span>Salve <?= $_SESSION['nome']; ?></span></div>
            <div class="box_button"><span class="button">
                    <a href="sair.php">sair</a>
                </span></div>
        </div>
        <div class="sidebar">
            <h2>Menu</h2>
            <p><a href="item.php">item 1</a></p>
            <p>item 2 </p>
            <p>item 3</p>
        </div>
        <div class="main">
            <h2>Manutenção de filmes</h2>
        </div>
    </div>
</body>

</html>