<?php
    require '../conexion.php';

    $query=$mysqli->query("SELECT * from t_item WHERE id = $_GET[id_item]");
    $item = array();
    while($r=$query->fetch_object()){ $item[]=$r; }
    if(count($item)>0){
    print "<option value=''>-- SELECCIONE --</option>";
    foreach ($item as $i) {
        print "<option value='$i->id'>$i->item</option>";
    }
    }else{
    print "<option value=''>-- NO HAY DATOS --</option>";
    }
?>