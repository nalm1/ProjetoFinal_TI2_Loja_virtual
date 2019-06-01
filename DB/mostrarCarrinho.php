<?php
    include 'connectToDatabase.php';
    session_start();
    if(isset($_SESSION['id']))$id = $_SESSION['id'];
    $query = "  SELECT *
                FROM produto
                left join (
                	SELECT prod_id, COUNT(id) AS quantidade
                	FROM carrinho
                	WHERE user_id LIKE $id
                	GROUP BY prod_id
                ) as b on id=b.prod_id
                WHERE quantidade > 0;
            ";



    $result = $conn->query($query);
    $json = array();
    $resultado = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $produto = array();
            if($row["imagem"]=="")
            {
                $image = "images/notFound.png";
            } else {
                $image = "images/".$row["imagem"];
            }
            $produto["id"] = $row["id"];
            $produto["nome"] = $row["nome"];
            $produto["preco"] = $row["preco"];
            $produto["descricao"] = $row["descricao"];
            $produto["imagem"] = $image;
            $produto["quantidade"] = $row["quantidade"];

            $resultado[] = $produto;
        }
    } else {
        $resultado['error'] = "Nenhum produto encontrado!";
    }
    $json['result'] = $resultado;
    echo json_encode($json);
    $conn->close();
?>
