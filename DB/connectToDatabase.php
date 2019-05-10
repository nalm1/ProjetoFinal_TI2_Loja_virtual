<?php
    $username = "P1rI3fokZa";
    $password = "sPtHShqmHp";
    $dbname = "P1rI3fokZa";
    $server = "remotemysql.com";
    $port = "3306";    
    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
