//formatação do CPF

const campoCpf = document.getElementById('cpf');

if (campoCpf) {
    campoCpf.addEventListener('input', function () {
        let numeros = campoCpf.value.replace(/\D/g, '').slice(0, 11);
        numeros = numeros.replace(/(\d{3})(\d)/, '$1.$2');
        numeros = numeros.replace(/(\d{3})(\d)/, '$1.$2');
        numeros = numeros.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        campoCpf.value = numeros;
    });
}

const botoesExcluir = document.querySelectorAll('.btn-excluir');
const dialogo = document.getElementById('dialogo-exclusao');
const campoIdExcluir = document.getElementById('id-usuario-excluir');
const nomeExcluir = document.getElementById('nome-usuario-excluir');

botoesExcluir.forEach(function (botao) {
    botao.addEventListener('click', function () {
        campoIdExcluir.value = botao.dataset.id;
        nomeExcluir.textContent = botao.dataset.nome;
        dialogo.showModal();
    });
});
