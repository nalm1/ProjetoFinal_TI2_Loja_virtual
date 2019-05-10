function carregar_produtos(destino){
    var div_destino = $("."+destino)[0];

    $.ajax({
        url: 'DB/carregaProdutos.php',
        success: function(obj){
            var data = $.parseJSON(obj);
            console.log(data.result);
            $.each(data.result, function (row, produto){
                produtos.push(produto);
                console.log(produto);
                div_destino.innerHTML += "<td><div class=\"imagem_descontos\"><img src=\""+ produto.imagem +"\" alt=\""+produto.id+"\"><div class=\"label_imagem_descontos\">"+produto.nome +" "+produto.preco+"€<br></div></div></td>";
            })
            setPopupEffect();
        }
    });
}
