<?php
$id = $_POST['id'];
$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$idade = $_POST["idade"];
$email = $_POST["email"];
$senha = $_POST["senha"];

include("../connection/conexao.php");

// $sql = "UPDATE `cadastro`.`usuarios` SET";

// $sql = $sql . " nome='" . $nome . "',";
// $sql = $sql . " sobrenome='" . $sobrenome . "',";
// $sql = $sql . " idade='" . $idade . "'";
// $sql = $sql . " email='" . $email . "'";
// $sql = $sql . " senha='" . $senha . "'";
// $sql = $sql . " WHERE (id = '" . $id."');";

$sql = "UPDATE `cadastro`.`usuarios` SET `nome` = '$nome', `sobrenome` = '$sobrenome', `idade` = '$idade', `email` = '$email', `senha` = '$senha' WHERE (`id` = '$id');";

echo $sql;

$resultado = mysqli_query($conexao, $sql);
print_r($resultado);
echo $resultado;
if ($resultado == 1) {
    echo '<script type="text/JavaScript"> 
    alert("Editado!");
    window.location="../pages/homeAdm.php";
    </script>';
} else {
    echo '<script type="text/JavaScript"> 
    alert("Erro!");
    window.location="../pages/homeAdm.php";
    </script>';
}

mysqli_close($conexao);
