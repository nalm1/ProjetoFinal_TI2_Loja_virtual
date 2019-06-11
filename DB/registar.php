<?php
    include 'connectToDatabase.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['mail'];

    $query = "SELECT username FROM user WHERE username LIKE '$username' LIMIT 1";
    $result = $conn->query($query);
    $json = array();

    if ($result->num_rows == 0) {
            $password = password_hash($password, PASSWORD_ARGON2I);
            $query = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";
            if($conn->query($query)){
                $json['result'] = ['msg'=> "Utilizador criado com sucesso!"];
            }
    } else {
        $json['result'] = ['msg'=> "Utilizador já existente!"];
    }
    echo json_encode($json);
    $conn->close();
?>
