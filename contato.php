<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Contato</title>
</head>
<style>
    h2{
        justify-content: center;
        display: flex;
    }

</style>
<?php include 'includes/header.php'; ?>
<body>
    <main>
        <section class="Hero">
            <h1>Contato</h1>
            <p>Entre em contato comigo</p>
        </section>
        <h2>Fale conosco</h2>
        <section id="informs">
            <div class="agoravai">
                <form action="#" class="form">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email">
                    <label for="mensagem">Mensagem</label>
                    <textarea name="mensagem" id="mensagem" cols="30" rows="10"></textarea>
                    <input type="submit" value="enviar">
                </form>
            </div>
        </section>
        <section id="contatos">
            <h3>Outras formas de contato:</h2>
            <ul>
                <p>phsl@etepd.com</p>
                <p>(81) 9 1111-1111</p>
            </ul>
        </section>
    </main>
</body>
<?php include 'includes/footer.php'; ?>
</html>