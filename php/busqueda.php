<?php

    $user_id=null;
    
    //$sql1= "SELECT t_funcionario.name,t_funcionario.lastname,t_position.position,t_areafuncional.area_funcional,t_funcionario.estado,t_funcionario.img_photo FROM (t_funcionario INNER JOIN t_position ON t_funcionario.id_position=t_position.id) INNER JOIN t_areafuncional ON t_funcionario.id_areafuncional=t_areafuncional.id";

    $sql1= "SELECT t_funcionario.id,t_funcionario.img_photo,t_funcionario.name,t_funcionario.lastname,t_position.position,t_areafuncional.area_funcional,t_funcionario.estado FROM (t_funcionario INNER JOIN t_position ON t_funcionario.id_position=t_position.id) INNER JOIN t_areafuncional ON t_funcionario.id_areafuncional=t_areafuncional.id WHERE t_funcionario.name like '%$_GET[s]%' or t_funcionario.lastname like '%$_GET[s]%'";

    $query = $mysqli->query($sql1);
?>

    <?php if($query->num_rows>0):?>
    <table class="table table-bordered table-hover">

    <thead>
        <th>Fotografia</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cargo</th>
        <th>Area Funcional</th>
        <th>Estado</th>
        <th>Accion</th>
    </thead>
<?php while ($r=$query->fetch_array()):?>
    
<tr>
    <td><img src="../photos/<?php echo $r['img_photo'];?>.jpg" class="img-rounded" width="80px" height="60px" /></td>
    <!--<td><img src="../photos/proof.jpg" class="img-rounded" width="70px" height="50px" /></td>-->
	<!--<td><?php echo $r['img_photo'];?></td>-->
    
    
	<td><?php echo $r["name"]; ?></td>
    <td><?php echo $r["lastname"]; ?></td>
    <td><?php echo $r["position"]; ?></td>
    <td><?php echo $r["area_funcional"]; ?></td>
    <td><?php echo $r["estado"]; ?></td>
    <td style="width:150px;">
        <a href="./see.php?id=<?php echo $r["id"];?>" class="btn btn-sm btn-info">Ver</a>
    
        <a href="./editar.php?id=<?php echo $r["id"];?>" class="btn btn-sm btn-warning">Editar</a>
    </td>

    
    <!--<td width="50px"><?php echo $r["estado"]; ?></td>-->
    
	
    <!--
  <td style="width:150px;">   
		<a href="./editar.php?idSolicitud=<?php echo $r["idSolicitud"];?>" class="btn btn-sm btn-warning">Editar</a>
  </td> -->
    
</tr>
    
<?php endwhile;?>
</table>

<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
