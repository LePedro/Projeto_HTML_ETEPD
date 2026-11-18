<?php
$stmt = $pdo->prepare('SELECT nome, autor, preco, imagem FROM produtos WHERE categoria = ? ORDER BY nome');
$stmt->execute([$categoria]);
?>
<div class="cards">
    <?php foreach ($stmt as $p): ?>
        <article class="catalogo">
            <img src="./assets/img/<?= htmlspecialchars($p['imagem'] ?: 'placeholder.jpg') ?>" width="150px">
            <h3><?= htmlspecialchars($p['nome']) ?></h3>
            <p>Autor: <?= htmlspecialchars($p['autor']) ?></p>
            <p>R$ <?= number_format($p['preco'], 2, ',', '.') ?></p>
            <button type="button" class="button-home" onclick="adicionarCarrinho(<?= htmlspecialchars(json_encode($p['nome']), ENT_QUOTES) ?>, <?= (float) $p['preco'] ?>)">Adicionar ao carrinho</button>
        </article>
    <?php endforeach; ?>
</div>
