<?php
// Iniciar a sessão
session_start();

// Verificar se o usuário está logado e é um Administrador
if (!isset($_SESSION['usuario_logado']) || $_SESSION['nivel'] !== 'Administrador') {
    // Redireciona para a página inicial caso não esteja logado ou não seja Administrador
    header("Location: index.php");
    exit();
}

// Caso o usuário esteja logado e seja Administrador, continua o código abaixo
require('includes/header.php');
?>

<body>
    <!-- Navbar -->
    <?php
    require('includes/navbar.php');
    ?>

    <!-- Formulário -->
    <div class="container">
        <h1><img src="images/logo transdevotos peq.jpg" alt=""></h1>
        <form action="processar_os.php" method="POST">
            <label for="numero_os">N° OS</label>
            <input type="text" id="numero_os" name="numero_os" required>

            <label for="tipo_servico">Tipo do Serviço</label>
            <input type="text" id="tipo_servico" name="tipo_servico" required>

            <label for="seguradora">Seguradora</label>
            <input type="text" id="seguradora" name="seguradora">

            <label for="numero_assistencia">Nº Assistência</label>
            <input type="text" id="numero_assistencia" name="numero_assistencia">

            <label for="segurado">Segurado</label>
            <input type="text" id="segurado" name="segurado">

            <label for="veiculo">Veículo</label>
            <input type="text" id="veiculo" name="veiculo">

            <label for="placa">Placa</label>
            <input type="text" id="placa" name="placa">

            <label for="contato">Contato</label>
            <input type="text" id="contato" name="contato">

            <label for="origem">Origem</label>
            <input type="text" id="origem" name="origem">

            <label for="bairro_origem">Bairro</label>
            <input type="text" id="bairro_origem" name="bairro_origem">

            <label for="cidade_origem">Cidade</label>
            <input type="text" id="cidade_origem" name="cidade_origem">

            <label for="referencia_origem">Referência Origem</label>
            <input type="text" id="referencia_origem" name="referencia_origem">

            <label for="destino">Destino</label>
            <input type="text" id="destino" name="destino">

            <label for="bairro_destino">Bairro</label>
            <input type="text" id="bairro_destino" name="bairro_destino">

            <label for="cidade_destino">Cidade</label>
            <input type="text" id="cidade_destino" name="cidade_destino">

            <label for="referencia_destino">Referência Destino</label>
            <input type="text" id="referencia_destino" name="referencia_destino">

            <label for="km">KM</label>
            <input type="text" id="km" name="km">

            <button type="submit">Enviar</button>
        </form>
    </div>

    <script>
        // Script para alternar a visibilidade do menu
        const menuIcon = document.getElementById("menu-icon");
        const sidebar = document.getElementById("sidebar");

        menuIcon.addEventListener("click", () => {
            sidebar.classList.toggle("active");
        });
    </script>
</body>

</html>
