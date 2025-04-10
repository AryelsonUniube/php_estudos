<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "servidor";

$conn = new mysqli($servidor, $usuario, $senha, $dbname);
if ($conn->connect_error) {
    die("Falha na conexao " . $conn->connect_error);
}