<?php
    $mysqli = new mysqli("localhost","root","y2k11sdf1xd.*","mh2020");
    if(mysqli_connect_errno()){
        echo 'conexion fallida: ',mysqli_connect_error();
        exit();
    }
?>