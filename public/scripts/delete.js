let inputExcluir = document.querySelectorAll('.excluir');

inputExcluir.forEach(element => {
    element.onclick = () => {
        id = element.getAttribute('key')
        local = element.getAttribute('local')
        console.log(local);
        swal({
            title: "Você tem certeza?",
            text: "Esta ação é irreversível",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Foi deletado!", {
                        icon: "success",
                    })
                        .then(() => {
                            let host = window.location.href
                            let path = host.split('/')[3]
                            window.location.href = `${window.location.origin}/${path}/controller/${local}Controller.php?excluir&id=${id}`
                        })
                }
            });
    };
});