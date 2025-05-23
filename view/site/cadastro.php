<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require('../../controller/conexao.php');

    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $confirmar_senha = $_POST['confirmar_senha'] ?? '';

    if (empty($nome) || empty($email) || empty($senha) || empty($confirmar_senha)) {
        echo "<script>alert('Por favor, preencha todos os campos.');</script>";
        return;
    }
    if ($senha !== $confirmar_senha) {
        echo "<script>alert('As senhas não correspondem. Tente novamente.');</script>";
        return;
    }

    $stmt = $mysqli->prepare("SELECT ID FROM Usuario WHERE email = ? OR nome = ?");
    $stmt->bind_param("ss", $email, $nome);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "<script>alert('E-mail ou nome já cadastrados. Tente usar outro.');</script>";
        $stmt->close();
        return;
    }

    $stmt->close();

    $senha_encriptada = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO Usuario (nome, email, senha, cpf, data_cadastro, telefone, assinatura)
                              VALUES (?, ?, ?, NULL, CURRENT_TIMESTAMP(), NULL, NULL)");
    $stmt->bind_param("sss", $nome, $email, $senha_encriptada);

    if ($stmt->execute()) {
        $usuario_id = $mysqli->insert_id;
        if (!isset($_SESSION)) {
            session_start();
        }
        
        $_SESSION['ID'] = $usuario_id;
        $_SESSION['nome'] = $nome;

        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Erro ao cadastrar. Tente novamente mais tarde.');</script>";
    }
    $stmt->close();
    $mysqli->close();
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
            <h1>Crie sua conta</h1>
            <h2>Ja tem uma conta ? <a href="login.php">clique aqui para fazer login</a></h2>
            <form action="" method="POST">          
                <label for="nome">Nome</label><br>
                <input type="text" id="nome" name="nome"><br>
                
                <label for="email">E-mail</label><br>
                <input type="text" id="email" name="email"><br>

                <label for="senha">Senha</label><br>
                <input type="password" id="senha" name="senha"><br><br>

                <label for="confirmar_senha">Confirmar senha</label><br>
                <input type="password" id="confirmar_senha" name="confirmar_senha"><br><br>
                <div id="checkbox"><input type="checkbox" ><p>Estou ciente dos Termos de uso e Políticas</p></div>

                <input type="submit" value="Cadastrar">
            </form>
        </main>
    </section>
</body>
</html>