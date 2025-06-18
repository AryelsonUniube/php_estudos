<?php
include("conexao.php");
require_once __DIR__ . '/validacoes.php';
$cpf = $_POST["cpf"];
$senha = $_POST["senha"];

$cpf = preg_replace('/[^0-9]/', '', $_POST["cpf"]);



if (!validar_cpf($cpf)) {
    die("erro ao validar cpf");
}

if (!isset($_POST['cpf']) || $_POST['cpf'] == '') {
    die("insira um cpf");
}
if (!isset($_POST['senha']) || $_POST['senha'] == '') {
    die("insira uma senha");
}

$sql = "select nome from usuarios where cpf=? and senha= ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ss", $cpf, $senha);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['nome'] != '') {
            session_start();
            $_SESSION["cpf"] = $cpf;
            $_SESSION["senha"] = $senha;
            $_SESSION["nome"] = $row['nome'];
            header("location: cadastro.php");
        } else {
            echo "senha ou cpf invalidos";
        }
    }
}
