async function getEndereco() {
    const inputEndereco = document.querySelector("#endereco")
    const inputCidade = document.querySelector("#cidade")
    const inputEstado = document.querySelector("#estado")
    const inputPais = document.querySelector("#pais")
    let cep = cepMask.unmaskedValue || ''

    cep = cep.length === 8 ? cep : "00000000"
    
    document.querySelector('.loading').style.display = 'grid'

    await fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then((response) => {
            return response.json()
        })
        .then(data => {
            document.querySelector('.loading').style.display = 'none'
            inputEndereco.value = data.logradouro

            if (!inTheArr(inputCidade, data.localidade)) {
                let option = document.createElement("option")
                option.text = data.localidade
                inputCidade.add(option)
                option.setAttribute('value', data.localidade)
                option.setAttribute('selected', 'true')
            }

            for (index of inputCidade.children) {
                if (index.getAttribute('value') === data.localidade) {
                    index.setAttribute("selected", "true")
                }
            }

            async function getNomeEstado() {
                const getEstado = await fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${data.uf}`)
                const nomeEstado = await getEstado.json()

                if (!inTheArr(inputEstado, nomeEstado.nome)) {
                    let option = document.createElement("option")
                    option.text = nomeEstado.nome
                    inputEstado.add(option)
                    option.setAttribute('value', nomeEstado.nome)
                    option.setAttribute('uf', data.uf)
                    option.setAttribute('selected', 'true')

                    let uf = document.createElement('input')
                    uf.setAttribute('type', 'hidden')
                    uf.setAttribute('name', 'txtUf')
                    uf.setAttribute('id', 'ufEstado')
                    uf.setAttribute('value', nomeEstado.sigla)
                    let form = document.querySelector('form')
                    form.append(uf)
                }

            }

            getNomeEstado();

            for (index of inputEstado.children) {
                if (index.getAttribute('uf') === data.uf) {
                    index.setAttribute("selected", "true")
                }
            }

            if (!inTheArr(inputPais, 'Brasil')) {
                let option = document.createElement("option")
                option.text = 'Brasil'
                inputPais.add(option)
                option.setAttribute('value', 'Brasil')
                option.setAttribute('selected', 'true')
            }

            if (!data.erro) {
                for (index of inputPais.children) {
                    if (index.innerText === 'Brasil') {
                        index.setAttribute("selected", "true")
                    }
                }
            }
        })
        .catch(() => { })
}

function inTheArr(arr, comparation) {
    let childs = Array.from(arr.children)

    return childs.some((a) => a.getAttribute('value') == comparation)
}