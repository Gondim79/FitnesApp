
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Fit</title>
    <link rel="icon" type="image/x-icon" href="images/fitnesicon.png">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #b19cd9, #77dd77);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box {
            color: #555;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }

        fieldset {
            border: 3px solid #1eff63;
        }

        legend {
            border: 1px solid #1eff97;
            padding: 10px;
            text-align: center;
            background: #2f2841;
            color: #00ff88;
            border-radius: 8px;
        }

        .inputBox {
            position: relative;
        }

        .inputUser, .inputSenha {
            background: none;
            border: none;
            border-bottom: 1px solid #555;
            outline: none;
            color: #555;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
            padding: 8px 0;
            margin-bottom: 15px;
        }

        .labelInput {
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }

        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput,
        .inputSenha:focus ~ .labelInput,
        .inputSenha:valid ~ .labelInput {
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }

        #data_nascimento {
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }

        #submit {
            background-image: linear-gradient(to right, #00b894, #00cec9);
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }

        #submit:hover {
            background-image: linear-gradient(to right, #2ecc71, #3498db);
        }

        @media only screen and (max-width:600px) {
            .box {
                width: 90%;
            }
        }

        @media only screen and (max-width:950px) {
            .box {
                width: 85%;
            }
        }    
    
    </style>
</head>
<body>
    <div class="box">
        <form action="cadastrar_action.php" method="post">
            <fieldset>
                <legend><b>Fórmulário de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+" title="Digite apenas letras">
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required pattern="[0-9]{10,}" title="Digite apenas números (mínimo 10)">
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputSenha" required pattern=".{6,}" title="Mínimo de 6 caracteres">
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+" title="Digite apenas letras">
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+" title="Digite apenas letras">
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>
