<?php
    $host = "";
    $user = "";
    $pass = "";
    $bd = "";

    $mysqli = new mysqli($host, $user, $pass, $bd);

    if($mysqli->connect_errno){
        echo "Falha na conexão" .$mysqli->connect_error;
        exit();
    }

?>