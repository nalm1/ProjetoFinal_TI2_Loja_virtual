function addCarrinho() {
    verificaLog(function(resp) {
        if (resp) {
            var alt = $('#modal_img').attr("alt");
            console.log(alt);
            $.ajax({
                url: 'DB/addCarrinho.php',
                method: "POST",
                data: {
                    "prod_id": alt
                },
                success: function(obj) {
                    var data = $.parseJSON(obj);
                    $.each(data.result, function(row, result) {
                        console.log(result);
                        showMsg(result);
                        if (result == "Adicionado com sucesso!") {
                            $("#closer").click();
                        }
                    })
                }
            });
        } else {
            $("#login").click();
        }
    });
}