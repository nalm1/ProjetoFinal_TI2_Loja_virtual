<?php
    session_start();
    include 'connectToDatabase.php';
    if(isset($_SESSION['hash']))$hash = $_SESSION['hash'];
    if(isset($_SESSION['username']))$username = $_SESSION['username'];
    if(isset($_SESSION['id']))$id = $_SESSION['id'];
    $query = "SELECT id, hash FROM user WHERE username LIKE '$username' LIMIT 1";
    $result = $conn->query($query);
    $json = array();
    
    if ($result->num_rows == 1) {
        while($row = $result->fetch_assoc()) {
            if($hash == $row['hash'] && $id == $row['id'])
            {
                $json['result'] = ['msg'=> 'Utilizador verificado com sucesso'];
            }
            else
            {
                $json['result'] = ['msg'=> 'Sessao incompatível! Alguém poderá ter entrado na sua conta!'];

            }
        }
    } else {
        $json['result'] = ['msg'=> 'Faça login, por favor!'];
        trigger_error('Invalid query: ' . $conn->error);

    }
    echo json_encode($json);
    $conn->close();
?>
