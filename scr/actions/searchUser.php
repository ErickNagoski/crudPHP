<?php

include("../connection/conexao.php");

$busca = "%".$_POST['busca']."%";

$sql = "SELECT * FROM usuarios WHERE nome like $busca or sobrenome like $busca;";

$resultado = mysqli_query($conexao,$sql);

if(!$resultado){
    echo '<script type="text/JavaScript"> 
    alert("Não foi possível buscar os dados!");
    </script>';
}
