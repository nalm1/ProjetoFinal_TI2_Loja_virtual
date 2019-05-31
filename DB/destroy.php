<?php
    session_start();
    $resp=0;
    if(isset($_SESSION['hash']))$resp=1;
    if(isset($_SESSION['username']))$resp=1;
    if(isset($_SESSION['id']))$resp=1;
    $json = array();
    if($resp){
        $json['result'] = ['msg'=> "Esqueceu-se de desligar a sessão a última vez que entrou!"];
        session_unset();
    }else{
        $json['result'] = ['msg'=> ""];
    }
    echo json_encode($json);
?>
