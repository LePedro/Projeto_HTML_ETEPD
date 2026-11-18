<?php
require 'includes/conexao.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare('SELECT id_usuario, senha FROM usuario WHERE email = ?');
    $stmt->execute([trim($_POST['email'])]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($_POST['senha'], $usuario['senha'])) {
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        header('Location: dashboard.php');
        exit;
    }
    $erro = 'E-mail ou senha incorretos.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Login</title>

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
        <?php if ($erro): ?><p><?= $erro ?></p><?php endif; ?>
        <form method="post">
            <div class="categoria">
            <div class="input">
                <label for="email">E-Mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input">
                <label for="Senha">Senha</label>
                <input type="password" id="Senha" name="senha" required>
            </div>
            <button type="submit">Enviar</button>
        </div>
        </form>
    </div>
</body>
<?php include 'includes/footer.php'; ?>
</html>