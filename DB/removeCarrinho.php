<?php
    include 'connectToDatabase.php';
    session_start();
    $id = $_SESSION['id'];
    $prod_id = $_REQUEST['prod_id'];

    $json = array();
    $query = "DELETE FROM carrinho
                WHERE prod_id like $prod_id AND user_id like $id
                order by id ASC
                limit 1;";

    if($conn->query($query)){
        $json['result'] = ['msg'=> "Removido com sucesso!"];
    }else {
        $json['result'] = ['msg'=> "Erro!"];
    }

    echo json_encode($json);
    $conn->close();
?>
