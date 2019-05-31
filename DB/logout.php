<?php
    session_start();
    $json = array();

    if(session_unset()){
        $json['result'] = ['msg'=> 'sessao destruida'];

    }else{
        $json['result'] = ['msg'=> $_SESSION['username']];
    }
    echo json_encode($json);
?>
