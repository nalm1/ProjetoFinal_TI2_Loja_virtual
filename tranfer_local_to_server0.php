<?php


/*
    Leitura de servidor de partida
*/

$servername_inicial = "remotemysql.com";
$username_inicial = "P1rI3fokZa";
$password_inicial = "sPtHShqmHp";
$dbname_inicial = "P1rI3fokZa";
// Create connection
$conn_inicial = new mysqli($servername_inicial, $username_inicial, $password_inicial, $dbname_inicial);
// Check connection
if ($conn_inicial->connect_error) {
    die("Connection failed: " . $conn_inicial->connect_error);
}
$query_inicial = "select * from produto";
$dados = $conn_inicial->query($query_inicial);

if ($dados->num_rows > 0) {

    while($row = $dados->fetch_assoc()) {
        for($i=0; $i<5; $i++){
            $sql = "Insert into produto (nome, preco, descricao, imagem) VALUES ('".$row["nome"]."',".$row["preco"].",'".$row["descricao"]."','".$row["imagem"]."')";
        }

        if ($conn_inicial->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn_inicial->error;
        }
    }


    $conn_inicial->close();
} else {
    echo "error";
}
?>
