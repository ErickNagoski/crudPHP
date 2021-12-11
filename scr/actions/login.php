<?php

include('../connection/conexao.php');

$email = $_POST["email"];
$senha = $_POST["senha"];


$sql = "SELECT email, senha,adm FROM usuarios WHERE email = '$email' and senha = '$senha';";
// echo "busca:. $sql";
$resultado = mysqli_query($conexao, $sql) or die("Erro na busca");

$row = $resultado->fetch_all();

if (count($row) > 0) {
    if($row[0][2]){
        header("Location: ../pages/homeAdm.php?busca=");
    }else{
        header("Location: ../pages/home.php?busca=");
    }
} else {
    echo "<script language='javascript' type='text/javascript'>
                                   alert('Login e/ou senha incorretos');
                         window.location.href='../../';</script>";
}
