<?php

    $is_local = 1;
    $username = "P1rI3fokZa";
    $password = "sPtHShqmHp";
    $dbname = "P1rI3fokZa";
    $server = "remotemysql.com";
    $port = "3306";

    $username_local = "root";
    $password_local = "";
    $dbname_local = "loja_virtual";
    $server_local = "localhost:3306";

    // Create connection
    if($is_local)
    {
        $conn = new mysqli($server_local, $username_local, $password_local, $dbname_local);
    }
    else
    {
        $conn = new mysqli($server, $username, $password, $dbname);
    }
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
