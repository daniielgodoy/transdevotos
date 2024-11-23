<?php
// Iniciar a sessão
session_start();

// Verificar se o usuário está logado e é um Administrador
if (!isset($_SESSION['usuario_logado']) || $_SESSION['nivel'] !== 'Administrador') {
    // Redireciona para a página inicial caso não esteja logado ou não seja Administrador
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>
    <div class="container">
        <div id="img">
            <img src="images/logo transdevotos peq.jpg" alt="Logo">
        </div>
        <form action="includes/processar_cadastro.php" method="POST">
            <label for="usuario">Usuário</label>
            <input type="text" id="usuario" name="usuario" required placeholder="Digite seu usuário">

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required placeholder="Digite sua senha">

            <label for="confirmar_senha">Confirmar Senha</label>
            <input type="password" id="confirmar_senha" name="confirmar_senha" required placeholder="Confirme sua senha">

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
