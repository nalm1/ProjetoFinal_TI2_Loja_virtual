

function onLoad(){

}


function carregar_produtos(destino, produtos){
    var div_destino = $("."+destino)[0];
    var contador=0;
    for(var i=0; i<produtos.length; i++)
    {
        div_destino.innerHTML += "<td><div class=\"imagem_descontos\"><img src=\""+ produtos[i].imagem +"\" alt=\""+produtos[i].id+"\"><div class=\"label_imagem_descontos\">"+produtos[i].nome +" "+produtos[i].preco+"€<br></div></div></td>";
        console.log("carregados " + i + " produtos para " + destino);
    }
    setPopupEffect();
}


function setPopupEffect(){
    /*
        Popup ao clica na imagem
    */
    var images = $("img");
    var modal = document.getElementById('modal');
    var modalImg = document.getElementById("modal_img");
    var captionText = document.getElementById("modal_captions");
    for (var i = 0; i < images.length; i++) {
        images[i].onclick = function(){

            modal.style.display = "block";
            modalImg.src = this.src;
            console.log(this.alt);
            var alt = parseInt(this.alt, 10);
            function findProdById (element){
                return element.id == alt;
            }
            var index = produtos.findIndex(findProdById);

            captionText.innerHTML = "<h1>" + produtos[index].nome.toUpperCase() + "</h1>";
            captionText.innerHTML +="<br>" + produtos[index].descricao;
            captionText.innerHTML +="<br>" + produtos[index].preco;
        }
    }
    // Get the <span> element that closes the modal
    var closer = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    closer.onclick = function() {
        modal.style.display = "none";
    }

}
