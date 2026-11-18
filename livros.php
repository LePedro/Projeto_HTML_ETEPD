<?php
require 'includes/conexao.php';
$categoria = 'Livro';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/script.js"></script>
    <title>Document</title>
</head>
<?php include 'includes/header.php'; ?>
<body>
    <main>
        <section class="Hero">
            <h1 id="h1-index">Livros</h1>
            <p>Navegue pela coleção de livros e quadrinhos</p>
        </section>
        <section id="catalogo">
            <h2>Coleção</h2>
            <?php include 'includes/produtos.php'; ?>
        </section>
    </main>
</body>
<?php include 'includes/footer.php'; ?>
</html>