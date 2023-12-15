<?php

$db_name = 'cadastro_usuarios'; // Nome do banco de dados que você criou
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';

try {
    // Conecta ao banco de dados usando PDO
    $pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Em caso de erro na conexão, exibe a mensagem de erro
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    die();
}