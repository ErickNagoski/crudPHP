<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/design.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            padding: 0;
            background-image: url(https://images.wallpaperscraft.com/image/single/full_moon_moon_black_170039_1920x1080.jpg);
            background-repeat: no-repeat;

        }
    </style>
</head>

<body>
    <div class="centerContainer">
        <a type="button" class="sairBtn" href="../../"">Sair</a>   
        <label>Usuários</label>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Idade</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("../crud/read.php");

                $adm = isset($_POST['adm']) ? $_POST['adm'] : 0;

                for ($i = 0; $i < count($usuarios); $i++) {
                    echo "
                    <tr>
                    <td>" . $usuarios[$i][0] . "</td>
                    <td>" . $usuarios[$i][1] . "</td>
                    <td> " . $usuarios[$i][2] . "</td>
                     <td>" . $usuarios[$i][3] . "</td>
                    <td>" . $usuarios[$i][4] . "</td>
                     <td>" . $usuarios[$i][5] . "</td>
                     ";

                    echo "<td>
                         <div>
                            <form method='post' action='../crud/delete.php'>
                                <input value='" . $usuarios[$i][0] . "' name='id' type='hidden'/>
                                 <button type='submit' class='tableBtn'>Excluir</button></form>
                            <form method='post' action='../pages/editar.php'>
                                <input value='" . $usuarios[$i][0] . "' name='id' type='hidden'/>
                                <button type='submit' class='tableBtn'>Editar</button></td></form>
                         </div>
                         </td>
                         </tr>";
                }
                ?>
            </tbody>
        </table>
        <div class=" searchContainer">
            <form method="get" action="">
                <div class="searchContainer">
                    <input type="text" name="busca" value="" placeholder="Pesquisar" />
                    <button type="submit" class="tableBtn">🔎</button>
                    </div>
            </form>

            <?php

            include("../connection/conexao.php");

            $data = isset($_GET['busca']) ? $_GET['busca'] : "";

            $busca = "%" . $data . "%";

            $sql = "SELECT * FROM usuarios WHERE nome like '$busca' or sobrenome like '$busca';";
            $resultado = mysqli_query($conexao, $sql);

            if ($resultado && $data != "") {
                $pesquisa = $resultado->fetch_all();
                echo '
                <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Idade</th>
                <th>Email</th>
                <th>Senha</th>
               
            </tr>
        </thead>
        <tbody>';

                foreach ($pesquisa as $key => $value) {

                    echo "
                <tr>
                    <td>" . $value[0] . "</td>
                    <td>" . $value[1] . "</td>
                    <td> " . $value[2] . "</td>
                     <td>" . $value[3] . "</td>
                    <td>" . $value[4] . "</td>
                     <td>" . $value[5] . "</td>
                     </tr>
                     </thead>
            <tbody>";
                }
            }

            ?>


    </div>
    </div>
</body>

</html>