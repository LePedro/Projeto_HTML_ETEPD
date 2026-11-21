<?php
session_start();

$config = require __DIR__ . '/../config/banco.php';

try {
    $pdo = new PDO(
        'mysql:host=' . $config['host'] . ';dbname=' . $config['banco'] . ';charset=utf8mb4',
        $config['usuario'],
        $config['senha']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log($e->getMessage());
    http_response_code(503);
    exit('Sistema temporariamente indisponível. Tente novamente mais tarde.');
}