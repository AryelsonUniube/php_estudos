<?php 
include("conexao.php");
$filme =$_POST['filme'];
$nome =$_POST['nome'];
$genero =$_POST['genero'];
$ano =$_POST['ano'];


$sql = "uptade filmes set nome=?, genero_id=?, ano=? where filme=?";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("ssss",$nome,$genero,$ano,$filme);
    if ($stmt->execute()) {
        header("Location: cadastroFilmes.php");
        die;
    }else{
        echo'erro';
    }
}
?>