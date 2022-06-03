async function getEndereco() {
    const inputEndereco = document.querySelector("input[name=endereco]")
    const inputCidade = document.querySelector("#cidade")
    const inputEstado = document.querySelector("#estado")
    const inputPais = document.querySelector("#pais")
    let cep = cepMask.unmaskedValue

    cep = cep.length === 8 ? cep : "00000000"

    await fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then((response) => {
            document.querySelector('.loading').style.display = 'grid'
            return response.json()
        })
        .then(data => {
            document.querySelector('.loading').style.display = 'none'
            inputEndereco.value = data.logradouro

            if (!inTheArr(inputCidade, data.localidade)) {
                let option = document.createElement("option")
                option.text = data.localidade
                inputCidade.add(option)
                option.setAttribute('nome', data.localidade)
                option.setAttribute('selected', 'true')
            }

            for (index of inputCidade.children) {
                if (index.getAttribute('nome') === data.localidade) {
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
                    option.setAttribute('nome', nomeEstado.nome)
                    option.setAttribute('uf', data.uf)
                    option.setAttribute('selected', 'true')
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
                option.setAttribute('nome', 'Brasil')
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

    return childs.some((a) => a.getAttribute('nome') == comparation)
}