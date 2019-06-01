function login(username, password) {
    var username = $('[name="log_txt"]').val();
    var password = $('[name="psw_txt"]').val();

    $.ajax({
        method: "POST",
        url: 'DB/login.php',
        data: {
            username: username,
            password: password
        },
        success: function(obj) {
            var data = $.parseJSON(obj);
            if (data.result.id != -1) {
                showMsg("Bem-vindo :: " + data.result.username);
                $("#modal_login .close").click();
                $("#userBar").html("<img class=\"barIcon\"src=\"./images/basket.png\">  <a class=\"login\" onclick=\"logout()\">logout</a> <a class=\"login\" onclick=\"carrinho()\">Carrinho</a>");
            } else {
                showMsg("Nome de utilizador e password não condizem");
            }
        }
    });

}

function registar() {
    var username = $('[name="log_rgst_txt"]').val();
    var password = $('[name="psw_rgst_txt"]').val();
    var mail = $('[name="mail_rgst_txt"]').val();


    $.ajax({
        method: "POST",
        url: 'DB/registar.php',
        data: {
            username: username,
            password: password,
            mail: mail
        },
        success: function(obj) {
            var data = $.parseJSON(obj);
            $.each(data.result, function(row, result) {
                console.log(result);
                showMsg(result);
                if (result == "Utilizador criado com sucesso!") {
                    $("#modal_registar .close").click();
                }
            })
        }
    });
}

function verificaLog(foo) {
    $.ajax({
        method: "POST",
        url: 'DB/verificaLog.php',
        success: function(obj) {
            var data = $.parseJSON(obj);
            $.each(data.result, function(row, result) {
                console.log(result);
                if (result == 'Utilizador verificado com sucesso') {
                    foo(1);
                } else {
                    foo(0);
                    showMsg(result);
                }
            })
        }
    });
}

function logout() {
    $.ajax({
        method: "POST",
        url: 'DB/logout.php',
        success: function(obj) {
            var data = $.parseJSON(obj);
            $.each(data.result, function(row, result) {
                console.log(result);
                showMsg(result);
                if (result == 'sessao destruida') {
                    location.reload();
                } else {
                    showMsg("Erro a terminar sessao, tente novamente!");
                }
            })
        }
    });
}

function carrinho() {

    $.ajax({
        url: 'DB/mostrarCarrinho.php',
        success: function(obj) {
            var data = $.parseJSON(obj);
            console.log(data.result);
            var i = 0;
            var html_row = "<tr>";
            $.each(data.result, function(row, produto) {
                produtos.push(produto);
                /*
                html_row += "<td><div data-toggle=\"modal\" data-target=\"#modal\" class=\"imagem_descontos\"><img src=\"" + produto.imagem + "\" alt=\"" + produto.id + "\"><div class=\"label_imagem_descontos\">" + produto.nome + "</div><div class=\"preco_imagem_descontos\">" + produto.preco + "€</div></div></td>";
                i += 1;
                if (i > 3) {
                    html_row += "</tr>";
                    div_destino.innerHTML += html_row;
                    html_row = "<tr>";
                    i = 0;
                }
                */
            })
        }
    });
}


function showPanel() {
    verificaLog(function() {
        console.log("Mostrar Painel!!");
    });
}