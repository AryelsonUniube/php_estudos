<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/formulario.css">

    <title>Document</title>
</head>

<body>

    <main>

        <div class="formulario">

            <header>
                <h2 class="title">LOGIN</h2>
            </header>

            <form action="./src/dados.php" method="post">

                <div class="cpf">
                    <input type="text" name="cpf" id="cpf" placeholder="CPF:"><br>
                </div>
                <div class="senha">
                    <input type="password" name="senha" id="senha" placeholder="Senha:"><br>
                </div>

                <input type="submit" value="Enviar" class="buton">

            </form>
        </div>
    </main>

</body>

</html>