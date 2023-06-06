function onFilter(button) {
    destroyCookie('ck-page-company-list', '/' + urlParams[3]);

    let name = $('#name').val();
    setCookie('ck-company-list-name-filter', name, -1, '/' + urlParams[3]);
}

function deleteCompany(idCompany) {
    Swal.fire({
        title: '<h5>Deseja realmente excluir esta empresa?</h5>',
        text: 'Não será possível reverter esta ação!',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'CANCELAR',
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'EXCLUIR'
    }).then((result) => {
        if (result.isConfirmed) {
            let timerInterval
            Swal.fire({
                title: 'Aguarde...',
                allowOutsideClick: false,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            });

            setInterval(function () {
                location.href = '/' + urlParams[3] + "/company/delete/" + idCompany;
            }, 1000);
        }
    })
}