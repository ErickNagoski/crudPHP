<?php
include("../connection/conexao.php");
$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$idade = $_POST["idade"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$adm = isset($_POST['adm'])?$_POST['adm']:0;

echo "Salvando: " . $nome . ", " . $sobrenome . ", " . $idade . ", " . $senha . ", " . $email . "<br />";

$sql = "INSERT INTO usuarios (nome,sobrenome,email, senha, idade, adm) VALUES ";
$sql = $sql . "('$nome','$sobrenome','$email','$senha','$idade', '$adm');";

echo "Instrução: " . $sql . "<br>";

$resultado = mysqli_query($conexao, $sql);

echo ("Resultado= " . $resultado . "<br>");

if ($resultado == 1) {
    header("Location: ../pages/successPage.html");
} else {
    echo "Não foi possível inserir!" . "<br>";
}
mysqli_close($conexao);

