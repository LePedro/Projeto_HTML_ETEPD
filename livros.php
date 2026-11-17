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
            <div class="cards">
                <article class="catalogo">
                    <img src="./assets/img/hobbit.jpg" width="150px">
                    <h3>O Hobbit</h3>
                    <p>Autor: J.R.R. Tolkien</p>
                    <p> R$ 40,00</p>
                    <button type="button" class="button-home" onclick="adicionarCarrinho('O Hobbit', 40)">Adicionar ao carrinho</button>
                </article>
                <article class="catalogo">
                    <img src="./assets/img/crime-e-castigo.jpg" width="150px">
                    <h3>Crime e Castigo</h3>
                    <p>Autor: Fiódor Dostoiévski</p>
                    <p> R$ 40,00</p>
                    <button type="button" class="button-home" onclick="adicionarCarrinho('Crime e Castigo', 40)">Adicionar ao carrinho</button>
                </article>
                <article class="catalogo">
                    <img src="./assets/img/1984.jpg" width="150px">
                    <h3>1984</h3>
                    <p>Autor: George Orwell</p>
                    <p> R$ 40,00</p>
                    <button type="button" class="button-home" onclick="adicionarCarrinho('1984', 40)">Adicionar ao carrinho</button>
                </article>
            </div>
        </section>
    </main>
</body>
<?php include 'includes/footer.php'; ?>
</html>