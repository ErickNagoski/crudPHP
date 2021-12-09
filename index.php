<!-- <?php
include_once "./connection/conexaoBD.php";
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./scr/css/design.css">
    
</head>
<body>
    <div class="container">
        <div class="formContainer">
            <form method="POST" action="./scr/connection/conexaoBD.php">
                <div>
                    <label>Email:</label>
                    <input type="text" id="email" value="" />
                </div>
                <div>
                    <label>Senha:</label>
                    <input type="password" id="password" value="" />
                </div>
                <button type="submit"></button>
            </form>
            <a href="./scr/pages/cadastro.html">Cadastro</a>
        </div>
    </div>
</body>

</html>