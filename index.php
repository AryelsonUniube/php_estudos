<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/formulario.css">

    <title>Document</title>
</head>
<script>
    function validarFormulario(event) {
        const cpf = document.getElementById('cpf').value;
        const senha = document.getElementById('senha').value;

        if (!validarCPF(cpf)) {
            alert("Cpf inválido.");
            document.getElementsByName("cpf").focus()
            return false;

        }
        if (!validarSenha(senha)) {
            alert(
                "A senha deve conter pelo menos 6 caracteres, incluindo uma letra maiúscula, ima letra minúscula e um número."
            );
            return false;

        }

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

    <main>

        <div class="formulario">

            <header>
                <h2 class="title">LOGIN</h2>
            </header>

            <form action="./src/dados.php" method="post" onsubmit=" return validarFormulario()">

                <div class="cpf">
                    <input type="text" name="cpf" id="cpf" placeholder="CPF:" required><br>
                </div>
                <div class="senha">
                    <input type="password" name="senha" id="senha" placeholder="Senha:" required><br>
                </div>

                <input type="submit" value="Enviar" class="buton">

            </form>

            <script>
                document.getElementById("cpf").focus();
            </script>
        </div>
    </main>

</body>

</html>