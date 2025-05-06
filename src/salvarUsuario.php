<?php

include("autenticacao.php");
include("conexao.php");

$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];


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