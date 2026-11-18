<?php
require 'includes/conexao.php';

if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit;
}

$stmt = $pdo->prepare('SELECT nome_usuario, cpf, endereco FROM usuario WHERE id_usuario = ?');
$stmt->execute([$_SESSION['id_usuario']]);
$usuario = $stmt->fetch();

$stmt = $pdo->query("SELECT categoria, COUNT(*) AS total FROM produtos GROUP BY categoria");
$totais = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Dashboard</title>
</head>
<body>
<?php include 'includes/header.php'; ?>
<main>
    <section class="Hero">
        <h1>Dashboard</h1>
        <p>Resumo da sua coleção de livros e quadrinhos.</p>
    </section>
    <div class="dashboard">
        <section class="perfil-dashboard">

            <img src="./assets/img/placeholder.jpg" width="250px">

            <h2>Dados de usuário</h2>

            <ul>
                <li>Nome: <?= htmlspecialchars($usuario['nome_usuario']) ?></li>
                <li>CPF: <?= htmlspecialchars($usuario['cpf']) ?></li>
                <li>Endereço: <?= htmlspecialchars($usuario['endereco'] ?? 'Não informado') ?></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>

        </section>

        <section class="adicionados">

            <h2>Adicionados recentemente</h2>

            <table border="1">

                <tr>
                    <th>Livro</th>
                    <th>Autor</th>
                    <th>Tipo</th>
                    <th>Status</th>
                </tr>

                <tr>
                    <td>O Hobbit</td>
                    <td>J.R.R. Tolkien</td>
                    <td>Livro</td>
                    <td>Lido</td>
                </tr>

                <tr>
                    <td>1984</td>
                    <td>George Orwell</td>
                    <td>Livro</td>
                    <td>Lendo</td>
                </tr>

                <tr>
                    <td>All Star Superman</td>
                    <td>Grant Morrison</td>
                    <td>Quadrinho</td>
                    <td>Lido</td>
                </tr>

            </table>

        </section>

        <div class="lado-direito">
            <section class="resumo">

                <h2>Resumo da coleção</h2>

                <ul>
                    <li>Total de livros: <?= $totais['Livro'] ?? 0 ?></li>
                    <li>Total de quadrinhos: <?= $totais['Quadrinho'] ?? 0 ?></li>
                    <li>Livros lidos: 2</li>
                    <li>Quadrinhos lidos: 1</li>
                </ul>

            </section>

            <section class="lendo">
                <h2>Lendo atualmente</h2>

                <ul>
                    <li>O Hobbit</li>
                    <li>All Star Superman</li>
                </ul>
            </section>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>