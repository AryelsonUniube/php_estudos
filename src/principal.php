<?php include("autenticacao.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/principal.css">



    <title>Document</title>
</head>

<body>
    <div class="body">
        <div class="content">
            <div class="haeder">
                <div class="name"><span>Salve <?= $_SESSION['nome']; ?></span></div>
                <div class="box_button"><span class="button">
                        <a href="../index.php"><img src="../img/1828427.png" alt="Sair"></a>
                    </span></div>
            </div>
            <div class="main-container">
                <div class="sidebar">
                    <h2 class="title menu">Menu</h2>
                    <p><a href="item.php">Item 1</a></p>
                    <p><a href="item.php">Item 2</a> </p>
                    <p><a href="item.php">Item 3</a></p>
                </div>
                <div class="main">
                    <div class="main content">
                        <h2 class="title main">Manutenção de filmes</h2>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam debitis optio cupiditate
                            ipsam
                            recusandae omnis reprehenderit veniam exercitationem quos possimus perferendis facere
                            repellendus
                            soluta quas nobis iste ipsum, tempora quia?
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque reprehenderit, quidem rerum,
                            corrupti omnis dignissimos veritatis ex quia incidunt tempora cum impedit sequi iste
                            adipisci
                            facere aliquam illo facilis perspiciatis.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>