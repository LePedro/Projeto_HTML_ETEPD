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
                <li>Nome: Pedro, Mago Supremo</li>
                <li>CPF: 111.111.111-11</li>
                <li>Endereço: Rua dos Alfeneiros</li>
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
                    <li>Total de livros: 3</li>
                    <li>Total de quadrinhos: 3</li>
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