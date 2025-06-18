<?php

include("conexao.php");

require_once __DIR__ . '/validacoes.php';


$cpf = preg_replace('/[^0-9]/', '', $_POST["cpf"]);

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