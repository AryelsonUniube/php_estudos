<?php 
include("conexao.php");
$filme =$_POST['filme'];
$nome =$_POST['nome'];
$genero =$_POST['genero'];
$ano =$_POST['ano'];


$stmt = $conn->prepare($sql);
$sql = "uptade filmes set nome=?, genero_id=?, ano=? where filme=?;";
if ($stmt) {
    $stmt->bind_param("siii",$nome,$genero,$ano,$filme);
    if ($stmt->execute()) {
        header("Location: cadastroFilmes.php");
        die;
    }else{
        echo'erro';
    }
}
?>