<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/design.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            padding: 0;
            background-image: url(https://images.wallpaperscraft.com/image/single/astronauts_astronaut_spacesuit_174777_1920x1080.jpg);
            background-repeat: no-repeat;

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="shadow">

            <div class="content">
                <label for="idEmailInput">Editar</label>

                <?php
                include('../actions/search.php');
                echo '
                    <form method="post" action="../crud/update.php" class="form">
                    <input type="text" name="nome" id="nome" value="' . $user[0][1] . '" placeholder="Nome: " />

                    <input type="text" name="sobrenome" id="sobrenome" value="' . $user[0][2] . '" placeholder="Sobrenome " />
                    <input type="number" name="idade" id="idade" value="' . $user[0][3] . '" placeholder="Idade" />

                    <input type="email" name="email" id="email" value="' . $user[0][4] . '" placeholder="Email:" />



                    <input type="password" name="senha" id="senha" value="' . $user[0][5] . '" placeholder="Senha" />
                    <input type="hidden" name="id" value="' . $user[0][0] . '" placeholder="Senha" />

                    <button type="submit" name="cadastro" value="cadastro">
                        Confirmar
                    </button>
                </form>';
                ?>



                <div class="signUpContainer">
                    <a href="./homeAdm.php">Voltar</a>
                </div>

            </div>

        </div>

    </div>
</body>

</html>