const btnCheck = document.querySelector('#diaTodo'),
    horaSelect = document.querySelector('#hora')

if (btnCheck && horaSelect) {
    if (btnCheck.checked)
        horaSelect.setAttribute('disabled', 'true')

    btnCheck.onclick = function () {
        if (btnCheck.checked) {
            horaSelect.setAttribute('disabled', 'true')
        } else {
            horaSelect.removeAttribute('disabled')
        }
    }
}