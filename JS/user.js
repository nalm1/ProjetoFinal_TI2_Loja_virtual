function login(username, password) {
    var username = $('[name="log_txt"]').val();
    var password = $('[name="psw_txt"]').val();
    console.log(username);
    console.log(password);

    $.ajax({
        method: "POST",
        url: 'DB/login.php',
        data: {
            username: username,
            password: password
        },
        success: function(obj) {
            var data = $.parseJSON(obj);
            console.log(data.result);
            $.each(data.result, function(row, result) {
                console.log(result)
            })
        }
    });
}

function registar() {
    $.ajax({
        method: "POST",
        url: 'DB/registar.php',
        data: {
            username: username,
            password: password
        },
        success: function(obj) {
            var data = $.parseJSON(obj);
            console.log(data.result);
            $.each(data.result, function(row, produto) {

            })
        }
    });
}