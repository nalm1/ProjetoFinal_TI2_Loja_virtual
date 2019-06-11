function loadScreen() {
    carregar_produtos("Descontos");

    $('#myModal').on('show.bs.modal', function(e) {
        $('.modal .modal-dialog').attr('class', 'modal-dialog fadeIn animated');
    })
    $('#myModal').on('hide.bs.modal', function(e) {
        $('.modal .modal-dialog').attr('class', 'modal-dialog fadeOutRight animated');
    })

}
