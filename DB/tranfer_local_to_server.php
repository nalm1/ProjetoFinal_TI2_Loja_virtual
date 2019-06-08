<?php


/*
    Leitura de servidor de partida
*/
$servername_inicial = "localhost";
$username_inicial = "root";
$password_inicial = "";
$dbname_inicial = "loja_virtual";

$servername_final = "remotemysql.com";
$username_final = "P1rI3fokZa";
$password_final = "sPtHShqmHp";
$dbname_final = "P1rI3fokZa";
// Create connection
$conn_inicial = new mysqli($servername_inicial, $username_inicial, $password_inicial, $dbname_inicial);
// Check connection
if ($conn_inicial->connect_error) {
    die("Connection failed: " . $conn_inicial->connect_error);
}
$query_inicial = "select * from produto";
$dados = $conn_inicial->query($query_inicial);

if ($dados->num_rows > 0) {
    // Create connection
    $conn = new mysqli($servername_final, $username_final, $password_final, $dbname_final);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    while($row = $dados->fetch_assoc()) {
        $sql = "INSERT INTO produto (nome, preco, descricao) VALUES ('".$row["nome"]."', ".$row["preco"].", '".$row["descricao"]."')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    $conn->close();
} else {
    echo "error";
}
echo
'<script>
    console.log(produtos);
    carregar_produtos("produtos", produtos);
</script>';
$conn_inicial->close();
?>
