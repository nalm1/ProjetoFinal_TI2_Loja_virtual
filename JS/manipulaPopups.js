function setPopupEffect() {
    /*
        Popup ao clica na imagem
    */
    var images = $(".Descontos img");
    var modal = document.getElementById('modal');
    var modalImg = document.getElementById("modal_img");
    var descricao = document.getElementById("modal_descricao");
    var titulo = document.getElementById("popupProdutoTitulo");
    for (var i = 0; i < images.length; i++) {
        images[i].onclick = function() {
            modalImg.src = this.src;
            modalImg.alt = this.alt;
            var alt = parseInt(this.alt, 10);

            function findProdById(element) {
                return element.id == alt;
            }

            var index = produtos.findIndex(findProdById);

            titulo.innerHTML = "<h1>" + produtos[index].nome.toUpperCase() + "</h1>";
            descricao.innerHTML = produtos[index].descricao;
            descricao.innerHTML += "<br>" + produtos[index].preco;

        }
    }
}

function showMsg(msg) {
    var x = $("#snackbar");
    x.html(msg);
    x.addClass("show");

    setTimeout(function() {
        x.removeClass("show");
    }, 3000);
}