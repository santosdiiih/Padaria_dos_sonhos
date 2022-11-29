const maskTel = ($el) => {

    let aux = $el.value;

    aux = aux.replace(/[^0-9]/g, '');
    aux = aux.replace(/(.{2})(.{4})(.{4})/, '($1) $2 - $3');

    $el.value = aux;
}


document.querySelector('#telefone').addEventListener('keyup', (e) => maskTel(e.target));

const maskCell = ($el) => {
    let valor = $el.value;

    valor = valor.replace(/[^0-9]/g, '');

    valor = valor.replace(/(.{2})(.{5})(.{4})/, '($1) $2 - $3');


    $el.value = valor;

}
document.querySelector('#celular').addEventListener('keyup', (e) => maskCell(e.target));