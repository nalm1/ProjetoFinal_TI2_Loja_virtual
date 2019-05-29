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
                var username = data.result.username;
                var id = data.result.id;
                showMsg("Bem-vindo :: " + username);
                $("#modal_login .close").click();
                $("#userBar").html("<img class=\"barIcon\"src=\"./images/basket.png\">  <a class=\"login\" onclick=\"logout()\">" + username + " &darr;</a>");
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

function logout() {
    location.reload();
}