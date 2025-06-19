<?php

include("autenticacao.php");
include("conexao.php");

include("validacoes.php"); 

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

if (!validar_cpf($cpf)) {
    echo "<script>alert('CPF inválido.'); window.history.back();</script>";
    exit;
}

if (!validar_senha($senha)) {
    echo "<script>alert('A senha deve conter pelo menos 6 caracteres, incluindo uma letra maiúscula, uma minúscula e um número.'); window.history.back();</script>";
    exit;
}


$senha = $_POST['senha'];
$nome = $_POST['nome'];
$cpfantigo = $_POST['cpfAnterior'];

if (!validar_cpf($cpf)) {
    die("CPF inválido!");
}
$sql = "UPDATE usuarios set cpf=?,senha=?, nome=? WHERE cpf = ?";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("ssss", $cpf, $senha, $nome, $cpfantigo);
    if ($stmt->execute()) {
        header("Location: cadastro.php");

        die;
    } else {
        echo 'erro';
    }
}