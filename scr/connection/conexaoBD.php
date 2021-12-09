<?php

$serverName = "localHost";
$userName = "root";
$password = "root";
$dbName = "cadastro";

$connect = mysqli_connect($serverName, $userName, $password, $dbName);

if (mysqli_connect_error()) :
    echo "Erro na conexão" . mysqli_connect_error();
endif;
