<?php
require 'includes/conexao.php';
require 'includes/funcoes.php';

$setores = $pdo->query('SELECT id_setor, nome FROM setores WHERE ativo = 1 ORDER BY nome')->fetchAll();
$perfis = $pdo->query('SELECT id_perfil, nome FROM perfis WHERE ativo = 1 ORDER BY nome')->fetchAll();

$erros = [];
$nome = '';
$email = '';
$cpf = '';
$setorId = 0;
$perfilId = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $cpf = preg_replace('/\D/', '', $_POST['cpf'] ?? '');
    $setorId = (int) ($_POST['setor_id'] ?? 0);
    $perfilId = (int) ($_POST['perfil_id'] ?? 0);

    if (mb_strlen($nome) < 3) {
        $erros['nome'] = 'O nome deve ter pelo menos 3 letras.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros['email'] = 'Informe um e-mail válido.';
    }

    if (strlen($senha) < 6 || strlen($senha) > 12) {
        $erros['senha'] = 'A senha deve ter entre 6 e 12 caracteres.';
    }

    if (strlen($cpf) !== 11) {
        $erros['cpf'] = 'O CPF deve ter 11 números.';
    }

    $stmt = $pdo->prepare('SELECT COUNT(*) FROM setores WHERE id_setor = ? AND ativo = 1');
    $stmt->execute([$setorId]);
    if ($stmt->fetchColumn() == 0) {
        $erros['setor_id'] = 'Escolha um setor da lista.';
    }

    $stmt = $pdo->prepare('SELECT COUNT(*) FROM perfis WHERE id_perfil = ? AND ativo = 1');
    $stmt->execute([$perfilId]);
    if ($stmt->fetchColumn() == 0) {
        $erros['perfil_id'] = 'Escolha um perfil da lista.';
    }

    if (count($erros) === 0) {
        try {
            $stmt = $pdo->prepare(
                'INSERT INTO usuario (nome_usuario, email, senha, cpf, setor_id, perfil_id) VALUES (?, ?, ?, ?, ?, ?)'
            );
            $stmt->execute([$nome, $email, password_hash($senha, PASSWORD_DEFAULT), $cpf, $setorId, $perfilId]);

            registrarAuditoria($pdo, $pdo->lastInsertId(), 'CADASTRO', 'Sucesso');

            $_SESSION['mensagem'] = 'Cadastro realizado com sucesso. Faça login para continuar.';
            header('Location: login.php');
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() === '23000') {
                $erros['geral'] = 'Já existe um cadastro com este e-mail ou CPF.';
            } else {
                error_log($e->getMessage());
                $erros['geral'] = 'Erro ao cadastrar. Tente novamente.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
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

    .login input,
    .login select {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    .login button {
        padding: 8px 20px;
    }
    </style>
</head>
<body>
<?php include 'includes/header.php'; ?>
<div class="login">
    <h1>Cadastro</h1>

    <?php if (isset($erros['geral'])): ?>
        <p class="erro"><?= e($erros['geral']) ?></p>
    <?php endif; ?>

    <form method="post" action="cadastro.php" novalidate>
        <div class="input">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="<?= e($nome) ?>" required>
            <small class="erro-campo"><?= e($erros['nome'] ?? '') ?></small>
        </div>
        <div class="input">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="<?= e($email) ?>" required>
            <small class="erro-campo"><?= e($erros['email'] ?? '') ?></small>
        </div>
        <div class="input">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" minlength="6" maxlength="12" required>
            <small class="erro-campo"><?= e($erros['senha'] ?? '') ?></small>
        </div>
        <div class="input">
            <label for="cpf">CPF</label>
            <input type="text" id="cpf" name="cpf" maxlength="14" value="<?= e($cpf) ?>" required>
            <small class="erro-campo"><?= e($erros['cpf'] ?? '') ?></small>
        </div>
        <div class="input">
            <label for="setor_id">Setor</label>
            <select id="setor_id" name="setor_id" required>
                <option value="">Selecione um setor</option>
                <?php foreach ($setores as $setor): ?>
                    <option value="<?= $setor['id_setor'] ?>" <?= $setorId == $setor['id_setor'] ? 'selected' : '' ?>><?= e($setor['nome']) ?></option>
                <?php endforeach; ?>
            </select>
            <small class="erro-campo"><?= e($erros['setor_id'] ?? '') ?></small>
        </div>
        <div class="input">
            <label for="perfil_id">Perfil</label>
            <select id="perfil_id" name="perfil_id" required>
                <option value="">Selecione um perfil</option>
                <?php foreach ($perfis as $perfil): ?>
                    <option value="<?= $perfil['id_perfil'] ?>" <?= $perfilId == $perfil['id_perfil'] ? 'selected' : '' ?>><?= e($perfil['nome']) ?></option>
                <?php endforeach; ?>
            </select>
            <small class="erro-campo"><?= e($erros['perfil_id'] ?? '') ?></small>
        </div>
        <button type="submit">Enviar</button>
    </form>
</div>
<?php include 'includes/footer.php'; ?>
<script src="./assets/js/usuarios.js"></script>
</body>
</html>