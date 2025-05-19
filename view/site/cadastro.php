<?php
    if (isset($_POST['email'])) {
        include('../../controller/conexao.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirmar_senha = $_POST['confirmar_senha'];

        if (empty($senha) || empty($confirmar_senha)) {
            echo "<script> alert('Por favor, preencha os dois campos de senha.'); </script> ";
        } else {
            if ($senha === $confirmar_senha) {
                $verificar_sql = "SELECT id_usuario FROM usuario WHERE email_usuario = ? OR nome_usuario = ?";
                $stmt = $mysqli->prepare($verificar_sql);
                $stmt->bind_param("ss", $email, $nome);
                $stmt->execute();
                $resultado = $stmt->get_result();

                if ($resultado->num_rows > 0) {
                    echo "<script> alert('Email ou nome já cadastrados. Tente usar outro.'); </script> ";
                } else {
                    $senha_encript = password_hash($senha, PASSWORD_DEFAULT);

                    $inserir_sql = "INSERT INTO `usuario` (`id_usuario`, `assinatura_usuario`, `telefone_usuario`, `email_usuario`, `nome_usuario`, `senha_usuario`, `cpf_usuario`, `data_cadastro_usuario`)
                                    VALUES (NULL, NULL, NULL, ?, ?, ?, NULL, current_timestamp())";
                    
                    $stmt = $mysqli->prepare($inserir_sql);
                    $stmt->bind_param("sss", $email, $nome, $senha_encript);
                    
                    if ($stmt->execute()) {
                        echo "<script> alert('Cadastro realizado com sucesso!'); </script> ";
                    } else {                
                        echo "<script> alert('Erro ao cadastrar. Tente novamente mais tarde.'); </script> ";
                    }
                }
                $stmt->close();
            } else {
                echo "<script> alert('As senhas não correspondem. Tente novamente.'); </script> ";
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