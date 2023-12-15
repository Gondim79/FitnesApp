<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Por favor, insira um endereço de e-mail válido.'); window.history.back();</script>";
    exit;
}
    $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
    $data_nascimento = filter_input(INPUT_POST, 'data_nascimento');
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);

    // Validação adicional
    if (
        $nome && $senha && $telefone && $email && $genero &&
        $data_nascimento && $cidade && $estado
    ) {
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() === 0) {
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, senha, telefone, email, genero, data_nascimento, cidade, estado) VALUES (:nome, :senha, :telefone, :email, :genero, :data_nascimento, :cidade, :estado)");
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':senha', $senha);
            $sql->bindValue(':telefone', $telefone);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':genero', $genero);
            $sql->bindValue(':data_nascimento', $data_nascimento);
            $sql->bindValue(':cidade', $cidade);
            $sql->bindValue(':estado', $estado);
            $sql->execute();

            // Adiciona um script JavaScript para exibir um pop-up
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href = 'index.php';</script>";
            exit;
        } else {
            echo "<script>alert('E-mail já cadastrado. Por favor, escolha outro e-mail.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Por favor, preencha todos os campos corretamente.'); window.history.back();</script>";
    }
}

// Redireciona para a página de login se o cadastro não ocorrer
header("Location: index.php");
exit;
?>
