<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Escambo</title>
    <link rel="stylesheet" type="text/css" href="stylemeuescambo.css">
</head>
<body>
    <div id="logomarca">
        <img src="img/logo.png" alt="logo">
    </div>
    
    <a href="Site-Home.html"><button class="button-back">voltar</button></a>

    <div id="div"></div>

    <div id="login">
    <form class="card" action="valida-login.php" method="POST">
    <div class="card-header">
        <h2>Login</h2>
    </div>

    <div class="card-content">
        <div class="card-content-area">
            <label for="email">Usuário</label>
            <input type="text" id="email" name="email" autocomplete="off">
        </div>


    </div>

    <div class="card-footer">
        <input type="submit" value="entrar" class="submit">
        <a href="#" class="recuperar_senha">Esqueceu a senha?</a>
    </div>
</form>
    </div>