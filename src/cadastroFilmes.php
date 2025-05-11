<?php include("autenticacao.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastroFilmes.css">



    <title>Document</title>
</head>

<body>
    <div class="body">
        <div class="content">
            <div class="haeder">
                <div class="name"><span>Salve <?= $_SESSION['nome']; ?></span></div>
                <div class="box_button"><span class="button">
                        <a href="./sair.php"><img src="../img/1828427.png" alt="Sair"></a>
                    </span></div>
            </div>
            <div class="main-container">
                <div class="sidebar">
                    <h2 class="title menu">Menu</h2>
                    <p><a href="./cadastro.php">cadastrar usuario</a></p>
                    <p><a href="./cadastroFilmes.php">cadastrar filmes</a> </p>
                    <p><a href="item.php">Item 3</a></p>
                </div>
                <div class="main">
                    <div class="main content">
                        <?php include("conexao.php") ?>
                        <h2 class="title main">Cadastro de filmes</h2>
                        <form action="inserirFilme.php" method="post">

                            <div class="nome">
                                <input type="text" name="nome" id="nome" placeholder="Nome:"><br>
                            </div>
                            <div class="ano">
                                <input type="text" name="ano" id="ano" placeholder="Ano:"><br>
                            </div>
                            <select name="genero" id="genero">
                                <option value="">Selecione um Gênero</option>
                                <?php
                                $sql = "select * from generos where status=1";
                                if (!$resultado = $conn->query($sql)) {
                                    die("erro");
                                }
                                while ($row = $resultado->fetch_assoc()) {
                                ?>
                                <option value="<?= $row['genero_id']; ?>"><?= $row['genero']; ?></option>
                                <?php
                                }
                                ?>
                            </select><br>
                            <input type="submit" value="enviar" class="buton">

                        </form>
                        <?php
                        include("conexao.php");
                        $sql = "select filmes.nome,generos.genero,filmes.ano,filmes.filme, filmes.genero_id from filmes inner join generos on filmes.genero_id = generos.genero_id";
                        if (!$resultado = $conn->query($sql)) {
                            die("erro");
                        }

                        ?>

                        <table>
                            <tr>
                                <td>Nome</td>
                                <td>genero</td>
                                <td>ano</td>


                            </tr>
                            <?php
                            while ($row = $resultado->fetch_assoc()) {
                                $generoAtual = $row['genero'];
                            ?>
                            <tr>
                                <form action="./alterarFilme.php" method="post">
                                    <input type="hidden" name="filmeAnterior" value="<?= $row['filme']; ?>">
                                    <input type="hidden" name="generoId" value="<?= $row['genero_id']; ?>">



                                    <td>
                                        <div class="nome"><input type="text" name="nome" value="<?= $row['nome']; ?>">
                                        </div>
                                    </td>

                                    <td>
                                        <select name="genero" id="genero">

                                            <option value="<?= $generoAtual; ?>"><?= $generoAtual; ?>
                                            </option>

                                        </select>
                                    </td>
                                    <td>
                                        <div class="ano"><input type="text" name="ano" value="<?= $row['ano']; ?>">
                                        </div>
                                    </td>
                                    <td><input type="submit" value="alterar" class="buton"></td>
                                </form>
                                <form action="./apagarFilme.php" method="post">
                                    <input type="hidden" name="filme" value="<?= $row['filme']; ?>">
                                    <td><input type="submit" value="apagar" class="buton"></td>
                                </form>
                            </tr>
                            <?php
                            } ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>