
//Seleciona os itens clicado
var menuItem = document.querySelectorAll('.item-menu')

function selectLink() {
    menuItem.forEach((item) =>
        item.classList.remove('ativo')
    )
    this.classList.add('ativo')
}

menuItem.forEach((item) =>
    item.addEventListener('click', selectLink)
)

var btnExp = document.querySelector('#btn-exp')
var menuSide = document.querySelector('.menu-lateral')

btnExp.addEventListener('click', function () {
    menuSide.classList.toggle('expandir')
})

let tempo = 0;
let cronometro;
let listaTempos = [];

document.getElementById('iniciar').addEventListener('click', () => {
    cronometro = setInterval(() => {
        tempo++;
        document.getElementById('tempo').textContent = formatarTempo(tempo);
    }, 1000);
});

document.getElementById('parar').addEventListener('click', () => {
    clearInterval(cronometro);
});

document.getElementById('resetar').addEventListener('click', () => {
    clearInterval(cronometro);
    tempo = 0;
    document.getElementById('tempo').textContent = formatarTempo(tempo);
    listaTempos.push(tempo);
    console.log(listaTempos);
});

function formatarTempo(tempo) {
    const horas = Math.floor(tempo / 3600);
    const minutos = Math.floor((tempo % 3600) / 60);
    const segundos = tempo % 60;

    return `${horas.toString().padStart(2, '0')}:${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;
}
