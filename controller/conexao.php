<?php

    $usuario = 'root';
    $senha = 'lince';
    $database = 'mydb';
    $host = 'localhost';

    $mysqli = new mysqli($host, $usuario, $senha, $database);

    if($mysqli->error) {
        die("Falha ao conectar ao banco de dados: " . $mysqli->error);
    }

?>