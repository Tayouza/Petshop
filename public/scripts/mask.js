const tel = document.querySelector("#telefone")
const cep = document.querySelector('#cep')

var cepMask = IMask(cep, {mask: '00000-000'})
var telMask = IMask(tel, {mask: '(00) 0 0000-0000'})
