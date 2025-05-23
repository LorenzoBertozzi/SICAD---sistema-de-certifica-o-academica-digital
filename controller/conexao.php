<?php

    $usuario = 'root';
    $senha = 'lince';
    $database = 'sicad';
    $host = 'localhost';

    $mysqli = new mysqli($host, $usuario, $senha, $database);

    if($mysqli->error) {
        die("Falha ao conectar ao banco de dados: " . $mysqli->error);
    }

    if ($mysqli->connect_errno) {
        die("Falha na conexão: " . $mysqli->connect_error);
    }
?>