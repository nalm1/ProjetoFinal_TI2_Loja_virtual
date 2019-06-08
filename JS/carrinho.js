function carrinho() {
    verificaLog(function(resp) {
        if(resp){
            var barra = $('#barraDireita');
            if (!barra.hasClass("barraAtiva")) {
                barra.addClass("barraAtiva");
            }
            var elm = $('#closer_latDir');
            if (!elm.hasClass("closer_latDir_active")) {
                elm.addClass("closer_latDir_active");
                elm.html(">");

            }
            $.ajax({
                url: 'DB/mostrarCarrinho.php',
                success: function(obj) {
                    var data = $.parseJSON(obj);
                    console.log(data.result);
                    var i = 0;
                    var html = "<ul class='latDir'>";
                    $.each(data.result, function(row, produto) {
                        produtos.push(produto);
                        html += "<li class='latDir_li'> <table width='100%'> <tr class='latDir_sizedRow'> <td rowspan='3' class='pos_relative'> <img src='"+produto.imagem+"' width='100px'alt=''> <span class='span_quantidade_carrinho'>"+produto.quantidade+"</span></img> </td> <td>"+produto.nome+"</td> <td class='latDir_lastTD'><button colspan='3' onclick='removeCarrinho("+produto.id+")' type='button' name='button'>remove 1</button></td></tr><tr><td>"+produto.descricao+"</td></tr><tr class='latDir_sizedRow latDir_rightRow'><td>"+produto.preco+"</td></tr></table></li>";
                    })
                    html += "</ul>";
                    barra.html(html);
                }
            });
        }

    });

}

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

function removeCarrinho(alt) {
    verificaLog(function(resp) {
        if (resp) {
            console.log(alt);
            $.ajax({
                url: 'DB/removeCarrinho.php',
                method: "POST",
                data: {
                    "prod_id": alt
                },
                success: function(obj) {
                    var data = $.parseJSON(obj);
                    $.each(data.result, function(row, result) {
                        console.log(result);
                        showMsg(result);
                        carrinho();
                    })
                }
            });
        } else {
            $("#login").click();
        }
    });
}
