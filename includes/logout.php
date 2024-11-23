<?php
// Inicia a sessão
session_start();

// Verifica se o usuário está logado
if (isset($_SESSION['id'])) {
    // Incluir o arquivo de conexão ao banco de dados
    require('mysqli.php');

    // Atualizar o status de "disponível" para "Não" quando o usuário fizer logout
    $user_id = $_SESSION['id']; // Assumindo que o ID do usuário está armazenado na sessão

    // Consulta SQL para atualizar o status do usuário
    $sql = "UPDATE login SET disponivel = 'Não' WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $user_id); // Passa o ID do usuário para a consulta
        if ($stmt->execute()) {
            // Status atualizado com sucesso
        } else {
            echo "<script>alert('Erro ao atualizar o status de disponibilidade.'); window.location.href = '../index.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Erro ao preparar a consulta de logout.'); window.location.href = '../index.php';</script>";
    }

    $conn->close();
}

// Destrói todas as variáveis de sessão
session_unset();

// Destrói a sessão
session_destroy();

// Redireciona o usuário para a página inicial ou login
header("Location: ../index.php");
exit();
?>
