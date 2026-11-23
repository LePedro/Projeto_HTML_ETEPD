<?php

function e($texto)
{
    return htmlspecialchars((string) $texto, ENT_QUOTES, 'UTF-8');
}

function autorAtual()
{
    if (isset($_SESSION['id_usuario'])) {
        return 'usuario:' . $_SESSION['id_usuario'];
    }

    return 'visitante';
}

function registrarAuditoria($pdo, $idUsuario, $acao, $resultado)
{
    $stmt = $pdo->prepare(
        'INSERT INTO auditoria_usuarios (usuario_alvo_id, acao, autor, resultado) VALUES (?, ?, ?, ?)'
    );
    $stmt->execute([$idUsuario, $acao, autorAtual(), $resultado]);
}

function csrfToken()
{
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function csrfCampo()
{
    return '<input type="hidden" name="csrf_token" value="' . e(csrfToken()) . '">';
}

function csrfValido()
{
    return isset($_POST['csrf_token'], $_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']);
}
