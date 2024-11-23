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
        <div id="img"><img src="images/logo transdevotos peq.jpg" alt=""></div>
        <!-- Alterando o 'action' para 'login.php' -->
        <form action="includes/login.php" method="POST">
            <label for="usuario">Usuário</label>
            <input type="text" id="usuario" name="usuario" required placeholder="Digite seu usuário">

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required placeholder="Digite sua senha">

            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
