<?php
include("../connection/conexao.php");

// $email = $_POST["email"];
// $senha = $_POST["senha"];

$sql = "SELECT * FROM cadastro.usuarios;";
// $sql = $sql . "('$nome','$sobrenome','$email','$senha','$idade');";

// echo "Instrução: " . $sql . "<br>";

$resultado = mysqli_query($conexao, $sql);

// echo ("Resultado= " . $resultado . "<br>");
$usuarios = $resultado->fetch_all();
// foreach ($resultado as $key => $value) {
//     print_r($value['nome']);
//     echo "<br/>";
// }

if (!$resultado) {
    echo '<script type="text/JavaScript"> 
    alert("Não foi possível buscar os dados!");
    </script>';
}
mysqli_close($conexao);
