<?php

//INSERT INTO `usuario` (`id_usuario`, `assinatura_usuario`, `telefone_usuario`, `email_usuario`, `nome_usuario`, `senha_usuario`, `cpf_usuario`, `data_cadastro_usuario`) VALUES (NULL, NULL, '00 0 0000-0000', 'teste@teste.com', 'Testador', '1234', NULL, current_timestamp());

include('../../controller/conexao.php');


if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuario WHERE email_usuario = '$email' AND senha_usuario = '$senha'";
        //SELECT * FROM usuario WHERE email_usuario = 'teste@teste.com' AND senha_usuario = '1234';
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;


        echo $quantidade;
        echo $email;
        echo $senha;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nome_usuario'] = $usuario['nome_usuario'];

            //header("Location: index.php");

        } else {
            echo "<script>alert('Falha ao logar! E-mail ou senha incorretos);</script>";
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