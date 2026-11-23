<?php
require 'includes/conexao.php';
require 'includes/funcoes.php';

if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit;
}
$mensagem = $_SESSION['mensagem'] ?? '';
unset($_SESSION['mensagem']);

$busca = trim($_GET['busca'] ?? '');
$termo = '%' . $busca . '%';

$stmt = $pdo->prepare(
    "SELECT u.id_usuario, u.nome_usuario, u.email, u.cpf, s.nome AS setor, p.nome AS perfil
     FROM usuario u
     LEFT JOIN setores s ON s.id_setor = u.setor_id
     LEFT JOIN perfis p ON p.id_perfil = u.perfil_id
     WHERE u.status = 'Ativo' AND (u.nome_usuario LIKE ? OR u.email LIKE ?)
     ORDER BY u.nome_usuario"
);
$stmt->execute([$termo, $termo]);
$usuarios = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Usuários</title>
</head>
<body>
<?php include 'includes/header.php'; ?>
<main class="listagem">
    <h1>Usuários</h1>

    <?php if ($mensagem !== ''): ?>
        <p class="aviso"><?= e($mensagem) ?></p>
    <?php endif; ?>

    <div class="card_usuario">
    <form method="get" action="usuarios.php" class="busca">
        <input type="text" name="busca" placeholder="Buscar por nome ou e-mail" value="<?= e($busca) ?>">
        <button type="submit">Buscar</button>
    </form>

    <table class="tabela-usuarios">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>CPF</th>
                <th>Setor</th>
                <th>Perfil</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= e($usuario['nome_usuario']) ?></td>
                    <td><?= e($usuario['email']) ?></td>
                    <td><?= e($usuario['cpf']) ?></td>
                    <td><?= e($usuario['setor'] ?? '-') ?></td>
                    <td><?= e($usuario['perfil'] ?? '-') ?></td>
                    <td>
                        <button type="button" class="btn-excluir"
                                data-id="<?= (int) $usuario['id_usuario'] ?>"
                                data-nome="<?= e($usuario['nome_usuario']) ?>">Excluir</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if (count($usuarios) === 0): ?>
        <p>Nenhum usuário encontrado.</p>
    <?php endif; ?>
    </div>
</main>

<dialog id="dialogo-exclusao" class="dialogo">
    <form method="post" action="usuarios_excluir.php">
        <?= csrfCampo() ?>
        <input type="hidden" name="id_usuario" id="id-usuario-excluir">
        <p>Dar baixa no usuário <strong id="nome-usuario-excluir"></strong>?</p>
        <div class="botoes-dialogo">
            <button type="submit" formmethod="dialog" class="botao-cancelar">Cancelar</button>
            <button type="submit" class="botao-confirmar">Confirmar</button>
        </div>
    </form>
</dialog>

<?php include 'includes/footer.php'; ?>
<script src="./assets/js/usuarios.js"></script>
</body>
</html>