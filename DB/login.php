<?php
    include 'connectToDatabase.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT id, password FROM user WHERE username LIKE $username LIMIT 1";
    $result = $conn->query($query);
    $json = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if(password_verify($password, $row['password']))
            {
                $json['result'] = ['id'=> $row["id"], 'username'=> $username];
            }
            else
            {
                $json['result'] = ['id'=> -1, 'username'=> ""];
            }
        }
    } else {
        $json['result'] = ['id'=> -1, 'username'=> ""];
    }
    echo json_encode($json);
    $conn->close();
?>
