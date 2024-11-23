<?php
require 'mysqli.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if ($senha !== $confirmar_senha) {
        echo "<script>alert('As senhas não coincidem!'); window.history.back();</script>";
        exit;
    }

    // Verificar se o nome de usuário já existe no banco de dados
    $sql = "SELECT * FROM login WHERE user = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        // Se encontrar algum resultado, significa que o nome de usuário já existe
        if ($result->num_rows > 0) {
            echo "<script>alert('Nome de usuário já está em uso!'); window.history.back();</script>";
            $stmt->close();
            exit;
        }

        $stmt->close();
    } else {
        echo "<script>alert('Erro na verificação do nome de usuário: " . $conn->error . "'); window.history.back();</script>";
        exit;
    }

    // Inserir o novo usuário
    $sql = "INSERT INTO login (user, senha, nivel, disponivel) VALUES (?, ?, 'usuario', 'Não')";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $usuario, $senha); // Usa a senha diretamente

        if ($stmt->execute()) {
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href = '../os.php';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar: " . $stmt->error . "'); window.history.back();</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Erro na preparação da query: " . $conn->error . "'); window.history.back();</script>";
    }

    $conn->close();
} else {
    echo "<script>alert('Requisição inválida!'); window.history.back();</script>";
}
?>
