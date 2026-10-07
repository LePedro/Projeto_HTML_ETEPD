function adicionarCarrinho(nome, preco) {

    let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];

    let produto = {
        nome: nome,
        preco: preco
    };

    carrinho.push(produto);

    localStorage.setItem("carrinho", JSON.stringify(carrinho));

    alert(nome + " foi adicionado ao carrinho!");
}

function mostrarCarrinho() {

    let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];

    let produtos = document.getElementById("produtos-carrinho");
    let total = document.getElementById("total");

    produtos.innerHTML = "";

    let valorTotal = 0;

    if (carrinho.length === 0) {

        produtos.innerHTML = "<p>O carrinho está vazio.</p>";

    } else {

        carrinho.forEach(function (produto) {

            let item = document.createElement("p");

            item.textContent = produto.nome + " - R$ " + produto.preco.toFixed(2);

            produtos.appendChild(item);

            valorTotal = valorTotal + produto.preco;

        });

    }

    total.textContent = "R$ " + valorTotal.toFixed(2);
}


mostrarCarrinho();