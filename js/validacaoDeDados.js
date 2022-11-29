const $name = document.querySelector('#nome');
const $tell = document.querySelector('#telefone');
const $cell = document.querySelector('#celular');
const $email = document.querySelector('#email');
const $mensagem = document.querySelector('#mensagem');
const $profisao = document.querySelector('#profisao');

// verificando se os dados estao preenchidos
const valida = () => {
    if ($name || $tell || $cell || $email || $mensagem || $profisao == "") {
        alert(" Preencha os dados obrigatorios por favor ");
    }
}


document.addEventListener('onclick', valida);