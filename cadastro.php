<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Cadastro</title>

<style>
.login {
    width: 300px;
    margin: 50px auto;
    padding: 20px;
    text-align: center;
}

.login .input {
    margin-bottom: 15px;
}

.login label {
    display: block;
    margin-bottom: 5px;
}

.login input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}

.login button {
    padding: 8px 20px;
}
    </style>
</head>
<?php include 'includes/header.php'; ?>
<body>
    <div class="login">
        <h1>Login</h1>
        <form action="dashboard.php" method="get">
            <div class="categoria">
            <div class="input">
                <label for="user">Usuário</label>
                <input type="text" id="user" required>
            </div>
            <div class="input">
                <label for="email">E-Mail</label>
                <input type="text" id="email" required>
            </div>
            <div class="input">
                <label for="Senha">Senha</label>
                <input type="password" maxlength = "12" required>
            </div>
            <div class="input">
                <label for="cpf" >CPF</label>
                <input type="text" id="cpf" maxlength = "14" required>
            </div>
            <button type="submit">Enviar</button>
        </div>
        </form>
    </div>
</body>
<?php include 'includes/footer.php'; ?>
</html>