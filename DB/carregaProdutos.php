<?php
include 'connectToDatabase.php';
$query = "select * from produto";
$result = $conn->query($query);
$json = array();
$resultado = array();
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

        $produto = array();

        $produto["id"] = $row["id"];
        $produto["nome"] = $row["nome"];
        $produto["preco"] = $row["preco"];
        $produto["descricao"] = $row["descricao"];
        $produto["imagem"] = $image;

        $resultado[] = $produto;
    }
} else {
    echo "<script> console.log(\"erro\")</script>";
    $aResult['error'] = "Nenhum produto encontrado!";
}
$json['result'] = $resultado;
echo json_encode($json);
$conn->close();
?>
