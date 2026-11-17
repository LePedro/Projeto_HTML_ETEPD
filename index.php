<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Index</title>
</head>
<style>

</style>
<?php include 'includes/header.php'; ?>
<body>
    <main>
        <section class="Hero">
            <h1 id="h1-index">Home</h1>
            <p>Navegue pela coleção de livros e quadrinhos</p>
        </section>
        <section id="catalogo">
            <h2>Coleção</h2>
            <div class="cards">
                <article class="catalogo">
                    <div class="categoria">
                        <img src="./assets/img/icon-livro.png" width="150px">
                        <h3>Livros</h3>
                        <p>Confira nossa coleção de livros</p>
                        <a href="livros.php">
                            <button type="button" class="button-home">clique aqui</button>
                        </a>
                    </div>
                </article>
                <article class="catalogo">
                    <div class="categoria">
                        <img src="./assets/img/icon-hq.png" width="150px">
                        <h3>Quadrinhos</h3>
                        <p>Navegue pelo nosso catálogo de HQ's</p>
                        <a href="quadrinhos.php">
                            <button type="button" class="button-home">clique aqui</button>
                        </a>
                    </div>
                </article>
            </div>
        </section>
    </main>
</body>
<?php include 'includes/footer.php'; ?>
</html>