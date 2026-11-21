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