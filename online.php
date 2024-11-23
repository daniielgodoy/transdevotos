<?php
// Iniciar a sessão
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_logado'])) {
    header('Location: index.php');
    exit();
}

// Verificar se o estado de disponibilidade está armazenado na sessão
$disponivel = isset($_SESSION['disponivel']) ? $_SESSION['disponivel'] : 0; // Default para 'Indisponível'
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="css/botoes.css">
    <style>
        /* Estilo básico para a navbar */
        .navbar {
            background-color: #132333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            border-bottom: 1px solid #ccc;
        }

        .navbar .user-name {
            font-size: 1.2rem;
            color: #f4f4f4;
        }

        .navbar .logout-btn {
            background-color: #f0a500;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .navbar .logout-btn:hover {
            background-color: #e89f00;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <span class="user-name"><?php echo $_SESSION['usuario_logado']; ?></span>
        <form action="includes/logout.php" method="POST">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </nav>
    <div class="botoes">
        <div id="img"><img src="images/logo transdevotos peq.jpg" alt=""></div>
        <div id="combobox">
            <!-- Exibe 'Indisponível' ou 'Disponível' com base na variável de sessão -->
            <div id="indisponivel" style="display: <?php echo $disponivel == 0 ? 'block' : 'none'; ?>;">
                <p id="indisponivel" onclick="disponivel()">Indisponível</p>
            </div>
            <div id="disponivel" style="display: <?php echo $disponivel == 1 ? 'block' : 'none'; ?>;">
                <p id="disponivel" onclick="indisponivel()">Disponível</p>
            </div>
        </div>
    </div>
</body>
<script>
    // Função para definir o estado como 'Disponível'
    function disponivel() {
        const disponivel = document.querySelector('div#disponivel');
        disponivel.style.display = "block";

        const indisponivel = document.querySelector('div#indisponivel');
        indisponivel.style.display = "none";

        // Envia o estado para o servidor
        atualizarDisponibilidade(1); // 1 = Disponível
    }

    // Função para definir o estado como 'Indisponível'
    function indisponivel() {
        const disponivel = document.querySelector('div#disponivel');
        disponivel.style.display = "none";

        const indisponivel = document.querySelector('div#indisponivel');
        indisponivel.style.display = "block";

        // Envia o estado para o servidor
        atualizarDisponibilidade(0); // 0 = Indisponível
    }

    // Função para atualizar o estado no servidor
    function atualizarDisponibilidade(status) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "includes/updateDisponivel.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Envia a requisição com o ID do usuário e o status
        xhr.send(`status=${status}`);
        
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log(xhr.responseText); // Para debug
            } else {
                console.error("Erro ao atualizar o status.");
            }
        };
    }
</script>
</html>
