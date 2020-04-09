<?php
    require '../conexion.php';

    
    $query=$mysqli->query("SELECT * from t_position WHERE id_af = $_GET[id_areafuncional] AND estado='vacancia'");
    $position = array();
    while($r=$query->fetch_object()){ $position[]=$r; }
    if(count($position)>0){
    print "<option value=''>-- SELECCIONE --</option>";
    foreach ($position as $p) {
        print "<option value='$p->id'>$p->position</option>";
    }
    }else{
    print "<option value=''>-- NO HAY DATOS --</option>";
    }
?>