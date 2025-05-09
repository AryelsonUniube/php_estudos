<?php

include("conexao.php");


$nome = $_POST['nome'];
$ano =$_POST['ano'];
$genero =$_POST['genero'];

$sql = "insert into filmes (filme,nome,ano,genero_id) values (null,?,?,?); ";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sss", $nome, $ano, $genero);
    if ($stmt->execute()) {
        header("Location: ./cadastroFilmes.php");

        die;
    } else {
        echo 'erro';
    }
}