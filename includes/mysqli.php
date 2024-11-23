<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";
$username = "root";  // Nome de usuário do banco de dados
$password = "";      // Senha do banco de dados
$dbname = "bd_transdevotos";  // Nome do seu banco de dados

// Criar conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>