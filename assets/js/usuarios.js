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