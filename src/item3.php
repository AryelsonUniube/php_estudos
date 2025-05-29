<?php include("autenticacao.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/videoaleatorio.css">



    <title>Document</title>
</head>

<body>


    <header>
        <span>Salve <?= $_SESSION['nome']; ?></span>

        <a href="./sair.php"><img src="../img/1828427.png" alt="Sair"></a>

    </header>

    <main>
        <nav>
            <h2 class="title menu">Menu</h2>
            <p><a href="./cadastro.php">cadastrar usuario</a></p>
            <p><a href="./cadastroFilmes.php">cadastrar filmes</a> </p>
            <p><a href="./item3.php">Item 3</a></p>

        </nav>

        <div class="content">
            <h2 class="title main">Cadastro de usuario</h2>

            <div class="videos">
                <iframe width="400" height="250" src="https://www.youtube.com/embed/YRo4xsaM5X4?si=3BqKLIl5gumRd4vw"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe width="400" height="250" src="https://www.youtube.com/embed/98GILnc2dvQ?si=DOZOGiX3RB5y56E9"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>


        </div>
    </main>



</body>

</html>


</body>

</html>