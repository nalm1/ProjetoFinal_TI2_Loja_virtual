<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="JS/index.js"></script>
        <title>Loja Virtual</title>
        <script>
            var produtos=[];
        </script>
    </head>
    <body onload="onLoad()">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/ps1.png" alt="1" style="width:100%;">
                </div>

                <div class="item">
                    <img src="images/ps1.png" alt="2" style="width:100%;">
                </div>

                <div class="item">
                    <img src="images/ps1.png" alt="3" style="width:100%;">
                </div>
            </div>

            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="userBar">
            <a id="login" class="login" >Login</a> ||
            <a id="login" class="registar">Registar</a>
        </div>

        <table>
            <!-- Header-->
            <tr>
                <td colspan="5"class="titulo_principal"><h1>Loja Virtual</h1></td>
            </tr>
            <!-- Descontos -->
            <tr class="Descontos"></tr>
            <!-- produtos -->
            <tr class="produtos"></tr>
        </table>
        <!-- Popup -->
        <div id="modal" class="modal">
            <div id="closer"class="close">&times;</div>
            <table>
                <tr>
                    <td><img class="modal-content" id="modal_img"></td>
                    <td>
                        <div id="modal_captions"></div>
                        <button type="button" class="btn_comprar">Adicionar ao carrinho</button>
                    </td>
                </tr>
            </table>
        </div>
        <div class="loginPopModal" class="modal">

        </div>
        <div class="registerPopModal" class="modal">

        </div>
        <!--
            Carrega dados dos produtos
        -->
        <?php
            include 'database.php';
            $prod_por_linha = 5;
            // Create connection
            $conn = new mysqli($server, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $query = "select * from produto";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                // output data of each row
                $counter = 0;
                while($row = $result->fetch_assoc()) {
                    if($row["imagem"]=="")
                    {
                        $image = "images/notFound.png";
                    } else {
                        $image = "images/".$row["imagem"];
                    }
                    echo '  <script>
                                var prod = {
                                    id:"'.$row["id"].'",
                                    nome: "'.$row["nome"].'",
                                    preco: '.$row["preco"].',
                                    descricao: "'.$row["descricao"].'",
                                    imagem: "'.$image.'"
                                };
                                produtos.push(prod);
                            </script>';
                }
            } else {
                echo "0 results";
            }
            echo'<script>
                console.log(produtos);
                carregar_produtos("produtos", produtos);
            </script>';
            $conn->close();
        ?>


        <div class="credits">Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
        <div class="credits">Bootstrap v3.4.0 <a href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">CSS</a> and <a href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">JS</a> ||| <a href="https://github.com/twbs/bootstrap/blob/v4.0.0/LICENSE">License</a></div>
        <div class="credits">Ajax <a href="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">v.3.3.1</a> ||| <a href="https://github.com/ForbesLindesay/ajax/blob/master/LICENSE">License</a></div>
    </body>
</html>
