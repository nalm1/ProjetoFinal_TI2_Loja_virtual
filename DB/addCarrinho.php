<?php
    include 'connectToDatabase.php';
    session_start();
    $id = $_SESSION['id'];
    $prod_id = $_REQUEST['prod_id'];

    $json = array();
    $query = "INSERT INTO carrinho (user_id, prod_id) VALUES ($id, $prod_id)";

    if($conn->query($query)){
        $json['result'] = ['msg'=> "Adicionado com sucesso!"];
    }else {
        $json['result'] = ['msg'=> "Erro!"];
    }

    echo json_encode($json);
    $conn->close();
?>
