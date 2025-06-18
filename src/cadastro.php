<?php include("autenticacao.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastroUsuario.css">



    <title>Document</title>
</head>
<script>
    function validarFormulario(event) {
        const cpf = document.getElementById('cpf').value;
        const senha = document.getElementById('senha').value;

        if (!validarCPF(cpf)) {
            alert("Cpf inválido.");
            document.getElementsById("cpf").focus()
            return false;

        }
        if (!validarSenha(senha)) {
            alert(
                "A senha deve conter pelo menos 6 caracteres, incluindo uma letra maiúscula, ima letra minúscula e um número."
            );
            return false;

        }
        return true;

        function validarCPF(cpf) {
            cpf = cpf.replace(/[^\d]+/g, '');

            if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) return false;

            let soma = 0;
            for (let i = 0; i < 9; i++) {
                soma += parseInt(cpf.charAt(i)) * (10 - i);
            }
            let resto = (soma * 10) % 11;
            if (resto === 10 || resto === 11) resto = 0;
            if (resto !== parseInt(cpf.charAt(9))) return false;

            soma = 0;
            for (let i = 0; i < 10; i++) {
                soma += parseInt(cpf.charAt(i)) * (11 - i);
            }
            resto = (soma * 10) % 11;
            if (resto === 10 || resto === 11) resto = 0;
            if (resto !== parseInt(cpf.charAt(10))) return false;

            return true;
        }

        function validarSenha(senha) {
            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
            return regex.test(senha);
        }
    }
</script>

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
            <form action="salvarUsuario.php" method="post" onsubmit=" return validarFormulario()">

                <div class="cpf">
                    <input type="text" name="cpf" id="cpf" placeholder="CPF:"><br>
                </div>
                <div class="nome">
                    <input type="text" name="nome" id="nome" placeholder="Nome:"><br>
                </div>
                <div class="senha">
                    <input type="password" name="senha" id="senha" placeholder="Senha:"><br>
                </div>
                <input type="submit" value="Enviar" class="buton enviar">

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
                        <form action="alterarUsuario.php" method="post" onsubmit=" return validarFormulario()">
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
                                <div class="senha"><input type="text" name="senha" value="<?= $row['senha']; ?>">
                                </div>
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
    </main>



</body>

</html>