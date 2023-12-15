<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha');

    if ($email && $senha) {
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $usuarioData = $sql->fetch(PDO::FETCH_ASSOC);
            if ($senha == $usuarioData['senha']) {
                // Senha correta, login bem-sucedido
                $_SESSION['usuario_id'] = $usuarioData['id'];
                header("Location: academia_pos.html");
                exit;
            } else {
                $mensagem = "Senha incorreta. Tente novamente.";
            }
        } else {
            $mensagem = "Email não encontrado. Tente novamente.";
        }
    } else {
        $mensagem = "Por favor, preencha todos os campos corretamente.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="images/fitnesicon.png">
    <style>
        /* Seu CSS existente */
        body {
            font-family: 'Noto Sans', sans-serif;
            margin: 0;
        }

        body * {
            box-sizing: border-box;
        }

        .main-login {
            width: 100vw;
            height: 100vh;
            background: linear-gradient(to right, #b19cd9, #77dd77);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .left-login {
            width: 50vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .left-login h1 {
            font-size: 2vw;
            color: #77ffc0;
        }

        .left-login-image {
            width: 35vw;
        }

        .right-login {
            width: 50vw;
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-login {
            width: 60%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 30px 35px;
            background: rgba(47, 40, 65, 0.9);
            border-radius: 20px;
            box-shadow: 0px 10px 40px #00000056;
        }

        .card-login h1 {
            color: #00ff88;
            font-weight: 800;
            margin: 0;
        }

        .textfield {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            margin: 10px 0px;
        }

        .textfield input {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 15px;
            background: #514869;
            color: #f0ffffde;
            font-size: 12pt;
            box-shadow: 0px 10px 40px #00000056;
            outline: none;
            box-sizing: border-box;
        }

        .textfield label {
            color: #f0ffffde;
            margin-bottom: 10px;
        }

        .textfield input::placeholder {
            color: #f0ffff94;
        }

        .btn-login {
            width: 100%;
            padding: 16px 0px;
            margin: 25px;
            border: none;
            border-radius: 8px;
            text-transform: uppercase;
            font-weight: 800;
            letter-spacing: 3px;
            color: #2b134b;
            background: linear-gradient(to right, #00b894, #00cec9);
            cursor: pointer;
            box-shadow: 0px 10px 40px -12px #00ff8052;
            transition: background 0.3s ease-in-out;
        }

        .btn-login:hover {
            background: linear-gradient(to right, #2ecc71, #3498db);
        }

        .card-login a {
            color: #00ff88;
            font-size: 12px;
            text-decoration: none;
            margin-top: 10px;
            transition: color 0.3s ease-in-out;
        }

        .card-login a:hover {
            color: #fff;
        }

        @media only screen and (max-width: 950px) {
            .card-login {
                width: 85%;
            }
        }

        @media only screen and (max-width: 600px) {
            .main-login {
                flex-direction: column;
            }

            .left-login h1 {
                display: none;
            }

            .left-login {
                width: 100%;
                height: auto;
            }

            .left-login-image {
                width: 50vw;
            }

            .card-login {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <h1>Faça login <br> E entre para o nosso time Fit</h1>
            <img src="images/corredor.svg" class="left-login-image" alt="corredor">
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>Login</h1>
                <form action="login.php" method="post">
                    <div class="textfield">
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="Email" required />
                    </div>
                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha" required />
                    </div>
                    <button type="submit" class="btn-login">Login</button>
                    <a href="cadastro.php">Se cadastre em nosso time!</a>
                </form>
                <?php if(isset($mensagem)) echo "<p>$mensagem</p>"; ?>
            </div>
        </div>
    </div>
</body>
</html>
