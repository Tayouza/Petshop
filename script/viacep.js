async function getEndereco(cep) {
    const inputEndereco = document.querySelector("input[name=endereco]")
    const inputCidade = document.querySelector("#cidade")
    const inputEstado = document.querySelector("#estado")

    cep = cep.length === 8 ? cep : "00000000"

    const response =
        await fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then((response) => response.json())
            .then(data => {
                inputEndereco.value = data.logradouro

                console.log(data);
                for(index of inputEstado.children){
                    if(index.attributes.uf.value === data.uf){
                        index.setAttribute("selected", "true")
                    }
                }
            })
            .catch(() => { })
}
