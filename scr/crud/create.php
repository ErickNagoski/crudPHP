<?
require_once '../connection/conexaoBD.php';

if (isset($_POST['btn-cadastro'])) :
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);

    $sql = "INSERT INTO usuarios (nome, sobrenome, email, senha, idade) VALUES ('$nome', '$sobrenome', '$email', '$senha', '$idade' )";


    if (mysqli_query($connect, $sql)) {
        // header('Location: ../pages/home.php');
        echo "ok";
    } else {
        echo "error";
        // header("Location: ../index.php?error");
    }
endif;
