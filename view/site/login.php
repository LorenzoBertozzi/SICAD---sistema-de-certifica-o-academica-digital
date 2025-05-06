<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SICAD - Sistema Academico de Certificação Digital</title>
    <link rel="shortcut icon" type="image/png" href="logo.png"/>
    <link rel="stylesheet" href="css/style-login-cadastro.css">
</head>
<body>
    <aside></aside>
    <section>
        <div class="logo">
            <img src="assets/logo.png">
            <div id="barra-vertical"></div>
            <div><p>Sistema <br> Academico de <br> Certificação <br> Digital</p></div>
        </div>
        <main>
            <h1>Acesse sua conta</h1>
            <h2>Ainda nao tem conta ? <a href="cadastro.html">clique aqui para criar uma</a></h2>
            <form action="" method="POST">                    
                <label for="email">E-mail</label><br>
                <input type="text" id="email" name="email"><br>

                <label for="senha">Senha</label><br>
                <input type="password" id="senha" name="senha"><br><br>

                <input type="submit" value="Entrar">
            </form>
            <a href="password-recover">Esqueceu a senha?</a>
        </main>
    </section>
</body>
</html>