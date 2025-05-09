<?php include("autenticacao.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastroUsuario.css">



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
                        <h2 class="title main">Cadastro de usuario</h2>
                        <form action="salvarUsuario.php" method="post">

                            <div class="cpf">
                                <input type="text" name="cpf" id="cpf" placeholder="CPF:"><br>
                            </div>
                            <div class="nome">
                                <input type="text" name="nome" id="nome" placeholder="Nome:"><br>
                            </div>
                            <div class="senha">
                                <input type="password" name="senha" id="senha" placeholder="Senha:"><br>
                            </div>
                            <input type="submit" value="Enviar" class="buton">

                        </form>
                        <?php
                        include("conexao.php");
                        $sql = "select nome,cpf,senha from usuarios";
                        if (!$resultado = $conn->query($sql)) {
                            die("erro");
                        }
                        ?>
                        <table>
                            <tr>
                                <td>Nome</td>
                                <td>cpf</td>
                                <td>senha</td>


                            </tr>
                            <?php
                            while ($row = $resultado->fetch_assoc()) {
                            ?>
                            <tr>
                                <form action="alterarUsuario.php" method="post">
                                    <input type="hidden" name="cpfAnterior" value="<?= $row['cpf']; ?>">
                                    <td>
                                        <div class="nome"><input type="text" name="nome" value="<?= $row['nome']; ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cpf"><input type="text" name="cpf" value="<?= $row['cpf']; ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="senha"><input type="text" name="senha"
                                                value="<?= $row['senha']; ?>"></div>
                                    </td>
                                    <td><input type="submit" value="alterar" class="buton"></td>
                                </form>
                                <form action="apagarUsuario.php" method="post">
                                    <input type="hidden" name="cpf" value="<?= $row['cpf']; ?>">
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