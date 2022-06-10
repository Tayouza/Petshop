const cpf = document.querySelector("#cpf")
const tel = document.querySelector("#telefone")
const cep = document.querySelector('#cep')

if(cpf && tel && cep){
    var cpfMask = IMask(cpf, {mask: '000.000.000-00'})
    var cepMask = IMask(cep, {mask: '00000-000'})
    var telMask = IMask(tel, {mask: '(00) 0 0000-0000'})
}