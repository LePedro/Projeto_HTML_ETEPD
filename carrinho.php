<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Carrinho</title>
</head>
<style>

</style>

<?php include 'includes/header.php'; ?>
<body>
    <main>
        <section class="Hero">
            <h1>Meu Carrinho</h1>
            <p>
                Confira os produtos adicionados ao seu carrinho.
            </p>
        </section>

        <section class="carrinho">
            <h2>Produtos</h2>

            <div id="produtos-carrinho">

                <!-- javascript adiciona os produtos aqui não apague. -->

            </div>
        </section>

        <section class="total">
            <h2>Total da compra</h2>
            <p id="total">
                R$ 0,00
            </p>
            <a href="carrinho.php">
                <button type="button" class="button-home" onclick="localStorage.clear();">Finalizar compra</button>
            </a>
        </section>

    </main>
    <script src="./assets/js/script.js"></script>
</body>
<?php include 'includes/footer.php'; ?>
</html>