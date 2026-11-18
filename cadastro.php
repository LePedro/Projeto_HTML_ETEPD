<?php
require 'includes/conexao.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare('INSERT INTO usuario (nome_usuario, email, senha, cpf) VALUES (?, ?, ?, ?)');
        $stmt->execute([
            trim($_POST['nome']),
            trim($_POST['email']),
            password_hash($_POST['senha'], PASSWORD_DEFAULT),
            trim($_POST['cpf'])
        ]);
        header('Location: login.php');
        exit;
    } catch (PDOException $e) {
        $erro = 'E-mail ou CPF já cadastrado.';
    }
}
?>
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
        <h1>Cadastro</h1>
        <?php if ($erro): ?><p><?= $erro ?></p><?php endif; ?>
        <form method="post">
            <div class="categoria">
            <div class="input">
                <label for="user">Usuário</label>
                <input type="text" id="user" name="nome" required>
            </div>
            <div class="input">
                <label for="email">E-Mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input">
                <label for="Senha">Senha</label>
                <input type="password" id="Senha" name="senha" maxlength="12" required>
            </div>
            <div class="input">
                <label for="cpf" >CPF</label>
                <input type="text" id="cpf" name="cpf" maxlength="14" required>
            </div>
            <button type="submit">Enviar</button>
        </div>
        </form>
    </div>
</body>
<?php include 'includes/footer.php'; ?>
</html>