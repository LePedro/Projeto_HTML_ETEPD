<?php
require 'includes/conexao.php';
require 'includes/funcoes.php';

if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método não permitido.');
}

if (!csrfValido()) {
    http_response_code(403);
    exit('Requisição inválida. Recarregue a página e tente novamente.');
}

$id = filter_input(INPUT_POST, 'id_usuario', FILTER_VALIDATE_INT);

if (!$id) {
    $_SESSION['mensagem'] = 'Usuário inválido. Nada foi alterado.';
    header('Location: usuarios.php');
    exit;
}

$stmt = $pdo->prepare('SELECT nome_usuario, status FROM usuario WHERE id_usuario = ?');
$stmt->execute([$id]);
$usuario = $stmt->fetch();

if (!$usuario) {
    $_SESSION['mensagem'] = 'Usuário não encontrado. Nada foi alterado.';
} elseif ($usuario['status'] === 'Baixa') {
    $_SESSION['mensagem'] = 'Este usuário já teve a baixa registrada.';
} else {
    $stmt = $pdo->prepare(
        "UPDATE usuario SET status = 'Baixa', baixado_em = NOW(), atualizado_em = NOW() WHERE id_usuario = ?"
    );
    $stmt->execute([$id]);

    registrarAuditoria($pdo, $id, 'BAIXA', 'Sucesso');

    $_SESSION['mensagem'] = 'Baixa registrada para ' . $usuario['nome_usuario'] . '.';
}

header('Location: usuarios.php');
exit;