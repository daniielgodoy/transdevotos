<?php
// Iniciar a sessão
session_start();

// Incluir o arquivo de conexão ao banco de dados
require('mysqli.php');

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Query SQL para verificar se o usuário e a senha existem
    $sql = "SELECT * FROM `login` WHERE `user` = ? AND `senha` = ?";
    $stmt = $conn->prepare($sql);

    // Verificar se a preparação da consulta foi bem-sucedida
    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    // Associar os parâmetros da consulta
    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se o usuário foi encontrado
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nivel = $row['nivel'];

        // Armazenar informações na sessão
        $_SESSION['usuario_logado'] = $row['user'];  // Define a variável de sessão para indicar que o usuário está logado
        $_SESSION['nivel'] = $row['nivel'];
        $_SESSION['id'] = $row['id']; // Caso você tenha um campo ID na tabela
        $_SESSION['disponivel'] = $row['Disponivel']; // Armazenar a disponibilidade na sessão

        // Redirecionar com base no nível
        if ($nivel == 'Administrador') {
            header("Location: ../os.php");
            exit();
        } else {
            header("Location: ../online.php");
            exit();
        }
    } else {
        // Mostrar mensagem de erro e redirecionar para a página de login
        echo "<script>alert('Usuário ou senha incorretos.'); window.location.href = '../index.php';</script>";
    }
}
$conn->close();
?>
