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
                        <?php include ("conexao.php")?>
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
                                <option value="<?=$row['genero'];?>"><?=$row['genero'];?></option>
                                <?php 
                                }
                                ?>
                            </select>
                            <input type="submit" value="Enviar" class="buton">

                        </form>
                        <?php
                        include("conexao.php");
                        $sql = "select filmes.nome,generos.genero,filmes.ano from filmes inner join generos on filmes.genero_id = generos.genero_id";
                        if (!$resultado = $conn->query($sql)) {
                            die("erro");
                        }
                        ?>
                        <table>
                            <tr>
                                <td>Nome</td>
                                <td>genero</td>
                                <td>ano</td>
                                <td>alterar</td>
                                <td>apagar</td>

                            </tr>
                            <?php
                            while ($row = $resultado->fetch_assoc()) {
                            ?>
                            <tr>
                                <form action="alterarUsuario.php" method="post">

                                    <td><input type="text" name="nome" value="<?= $row['nome']; ?>"></td>
                                    <td><input type="text" name="genero" value="<?= $row['genero']; ?>"></td>
                                    <td><input type="text" name="ano" value="<?= $row['ano']; ?>"></td>
                                    <td><input type="submit" value="alterar"></td>
                                </form>
                                <form action="apagarUsuario.php" method="post">
                                    <input type="hidden" name="cpf" value="<?= $row['cpf']; ?>">
                                    <td><input type="submit" value="apagar"></td>
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