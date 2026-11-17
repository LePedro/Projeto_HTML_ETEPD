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
            <h1 id="h1-index">Quadrinhos</h1>
            <p>Navegue pela coleção de quadrinhos</p>
        </section>
        <section id="catalogo">
            <h2>Coleção</h2>
            <div class="cards">
                <article class="catalogo">
                    <img src="./assets/img/superman.jpg" width="150px">
                    <h3>All Star Superman</h3>
                    <p>Autor: Grant Morrison</p>
                    <p> R$ 25,00</p>
                    <button type="button" class="button-home" onclick="adicionarCarrinho('All Star Superman', 25)">Adicionar ao carrinho</button>
                </article>
                <article class="catalogo">
                    <img src="./assets/img/hq-2.webp" width="150px">
                    <h3>Absolute Martian Manhunter Vol.1: Martian Vision</h3>
                    <p>Autor: Deniz Camp</p>
                    <p> R$ 25,00</p>
                    <button type="button" class="button-home" onclick="adicionarCarrinho('Absolute Martian Manhunter Vol.1: Martian Vision', 25)">Adicionar ao carrinho</button>
                </article>
                <article class="catalogo">
                    <img src="./assets/img/invencivel.jpg" width="150px">
                    <h3>Invencível Foil Edition</h3>
                    <p>Autor: Robert Kirkman</p>
                    <p> R$ 25,00</p>
                    <button type="button" class="button-home" onclick="adicionarCarrinho('Invencível Foil Edition', 25)">Adicionar ao carrinho</button>
                </article>
            </div>
        </section>
    </main>
</body>
<?php include 'includes/footer.php'; ?>
</html>