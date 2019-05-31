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
        while($row = $result->fetch_assoc()) {
            if(password_verify( $password,$row['password']))
            {
                $hash = random_bytes(10);
                $id = $row['id'];
                $query = "UPDATE user SET hash = '$hash' WHERE id = $id";
                if($conn->query($query)){
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["username"] = $username;
                    $_SESSION["hash"] = $hash;
                    $json['result'] = ['id'=> $_SESSION["id"], 'username'=> $_SESSION["username"]];
                }else {
                    $json['result'] = ['id'=> -1, 'username'=> "", 'msg'=> 'Erro!'];
                }

            }
            else
            {
                $json['result'] = ['id'=> -1, 'username'=> "", 'msg'=> 'Erro!'];
            }
        }
    } else {
        $json['result'] = ['id'=> -1, 'username'=> "", 'msg'=> 'Erro!'];
    }
    echo json_encode($json);
    $conn->close();
?>
