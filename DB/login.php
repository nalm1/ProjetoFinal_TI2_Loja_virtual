<?php
    include 'connectToDatabase.php';
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT id, password FROM user WHERE username LIKE '$username' LIMIT 1";
    $result = $conn->query($query);
    $json = array();
    if(!$result){
        trigger_error('Invalid query: ' . $conn->error);
    }
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if($row) {
            if(password_verify( $password,$row['password']))
            {
                $hash = random_bytes(10);
                $id = $row['id'];

                $query = "UPDATE user SET hash = '$hash' WHERE id = $id";
                $result = $conn->query($query);
                if($result){
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["username"] = $username;
                    $_SESSION["hash"] = $hash;
                    $json['result'] = ['id'=> $_SESSION["id"], 'username'=> $_SESSION["username"]];
                }else {
                    $json['result'] = ['id'=> -1, 'username'=> "", 'msg'=> 'Erro!1'];
                }

            }
            else
            {
                $json['result'] = ['id'=> -1, 'username'=> "", 'msg'=> 'Erro!2'];
            }
        }
    } else {
        $json['result'] = ['id'=> -1, 'username'=> "", 'msg'=> 'Erro!3'];
    }
    echo json_encode($json);
    $conn->close();
?>
