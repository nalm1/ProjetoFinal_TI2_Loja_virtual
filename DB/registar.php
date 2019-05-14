<?php
    include 'connectToDatabase.php';
    $username = $POST['username'];
    $password = $POST['password'];
    $query = "SELECT username FROM user WHERE username LIKE $username LIMIT 1";
    $result = $conn->query($query);
    $json = array();
    if ($result->num_rows == 0) {
            $password = password_hash($password, PASSWORD_ARGON2I);
            $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
            $json['result'] = {msg: "Utilizador criado com sucesso!"};
    } else {
        $json['result'] = {msg: "Utilizador já existente!"};
    }
    echo json_encode($json);
    $conn->close();
?>
