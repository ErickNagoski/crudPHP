<?php
$id = $_POST['id'];

include("../connection/conexao.php");

$sql = "SELECT * FROM cadastro.usuarios WHERE id = '$id';";
// $sql = $sql . "('$nome','$sobrenome','$email','$senha','$idade');";

// echo "Instrução: " . $sql . "<br>";

$resultado = mysqli_query($conexao, $sql);

$user = $resultado->fetch_all();
