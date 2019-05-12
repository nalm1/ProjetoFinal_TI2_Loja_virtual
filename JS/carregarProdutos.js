function carregar_produtos(destino){
    var div_destino = $("."+destino)[0];

    $.ajax({
        url: 'DB/carregaProdutos.php',
        success: function(obj){
            var data = $.parseJSON(obj);
            console.log(data.result);
            var i=0;
            var html_row="<tr>";
            div_destino.innerHTML = "<tr>"
            $.each(data.result, function (row, produto){
                produtos.push(produto);
                html_row += "<td><div class=\"imagem_descontos\"><img src=\""+ produto.imagem +"\" alt=\""+produto.id+"\"><div class=\"label_imagem_descontos\">"+produto.nome +" "+produto.preco+"€</div></div></td>";
                i+=1;
                if(i > 3) {
                    html_row += "</tr>";
                    div_destino.innerHTML += html_row;
                    html_row = "<tr>";
                    i=0;
                }
                console.log(i);
            })
            if(i<3)
                div_destino.innerHTML += html_row;
            setPopupEffect();
        }
    });
}
