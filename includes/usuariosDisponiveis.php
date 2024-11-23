<?php
// Iniciar a sessão
session_start();

// Incluir o arquivo de conexão ao banco de dados
require('mysqli.php');

// Consultar os usuários disponíveis
$sql = "SELECT user FROM `login` WHERE `Disponivel` = 1"; // Alterei para pegar apenas o campo 'user'
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibe os usuários disponíveis
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row['user'] . "</p>"; // Exibe o nome do usuário disponível
    }
} else {
    echo "<p>Nenhum usuário disponível no momento.</p>";
}

$conn->close();
?>
