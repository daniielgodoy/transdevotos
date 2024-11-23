<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_logado'])) {
    header('Location: index.php');
    exit();
}

require('mysqli.php');

// Verificar se o estado foi passado na requisição
$status = isset($_POST['status']) ? $_POST['status'] : 0;

// Obter o ID do usuário
$userId = $_SESSION['id'];

// Atualizar o estado de disponibilidade no banco de dados
$sql = "UPDATE login SET Disponivel = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $status, $userId);

if ($stmt->execute()) {
    // Atualizar a sessão com o novo status
    $_SESSION['disponivel'] = $status;
    echo "Status atualizado com sucesso!";
} else {
    echo "Erro ao atualizar o status.";
}

$stmt->close();
$conn->close();
?>
