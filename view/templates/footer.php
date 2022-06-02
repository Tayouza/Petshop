<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="../script/viacep.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    let inputExcluir = document.querySelectorAll('.excluir');

    inputExcluir.forEach(element => {
        element.onclick = () => {
            id = element.getAttribute('key')
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
                            .then(() =>
                                window.location.href = `${window.location.origin}/petshoptay/controller/CidadeController.php?excluir&id=${id}`
                            )
                    }
                });
        };
    });
</script>

</body>

</html>