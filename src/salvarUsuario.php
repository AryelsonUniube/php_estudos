<?php

include("autenticacao.php");
include("conexao.php");
require_once __DIR__ . '/validacoes.php';


$cpf = preg_replace('/[^0-9]/', '', $_POST["cpf"]);
$nome = $_POST['nome'];
$senha = $_POST['senha'];



if (!validar_cpf($cpf)) {
    die("CPF inválido!");
}
if (!validar_senha($senha)) {
    die(
        "A senha deve conter pelo menos 6 caracteres, incluindo uma letra maiúscula, uma letra minúscula e um número."
    );
}
$sql = "insert into usuarios (cpf,nome,senha) values (?,?,?); ";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sss", $cpf, $nome, $senha);
    if ($stmt->execute()) {
        header("Location: cadastro.php");

        die;
    } else {
        echo 'erro';
    }
}