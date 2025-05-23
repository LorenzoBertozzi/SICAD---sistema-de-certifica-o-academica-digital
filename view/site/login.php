<?php
include('../../controller/conexao.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0) {
        echo "<script>alert('Preencha seu e-mail');</script>";
    } else if (strlen($_POST['senha']) == 0) {
        echo "<script>alert('Preencha sua senha');</script>";
    } else {
        if (!isset($_SESSION)) {
            session_start();
        }
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $mysqli->prepare("SELECT ID, nome, senha FROM usuario WHERE email = ?");
        if (!$stmt) {
            die("Erro ao preparar statement: " . $mysqli->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();

            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['ID'] = $usuario['ID'];
                $_SESSION['nome'] = $usuario['nome'];

                echo "<script>alert('Senha correta');</script>";

                header("Location: index.php");
                //exit();
            } else {
                echo "<script>alert('Senha incorreta');</script>";
            }
        } else {
            echo "<script>alert('Usuário não encontrado');</script>";
        }
        $stmt->close();
        $mysqli->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SICAD - Sistema Academico de Certificação Digital</title>
    <link rel="icon" href="assets/miniatura.png">
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
            <h2>Ainda nao tem conta ? <a href="cadastro.php">clique aqui para criar uma</a></h2>
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