<?php
include("../connection/conexao.php");

$id = $_POST['id'];

echo $id;

$sql = "DELETE FROM usuarios WHERE id = '$id'";
$result = mysqli_query($conexao, $sql);
if ($result) {
    echo $result;
    echo "<script type='text/JavaScript'> 
    alert('Excluido com sucesso!');
	window.location='../pages/homeAdm.php';
    </script>";
} else {
    echo "<script type='text/JavaScript'> 
        alert('Não foi possível excluir!');
        window.location='../pages/homeAdm.php';
        </script>";
}
