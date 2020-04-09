<?php 
    session_start();
    require '../conexion.php';

	if(!isset($_SESSION["login"])){
		header("Location: index.php");
	}
	
    $login = $_SESSION['login'];
    
    $query = "SELECT DISTINCT id,area_funcional FROM t_areafuncional";
    
    $resultado=$mysqli->query($query);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atic</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>



    
    <script type="text/javascript">
        $(document).ready(function(){
            $("#cbx_area_funcional").change(function(){
                $.get("get_position.php","id_areafuncional="+$("#cbx_area_funcional").val(), function(data){
                    $("#cbx_position").html(data);
                    console.log(data);
                });
            });

            $("#cbx_position").change(function(){
                $.get("get_item.php","id_position="+$("#cbx_position").val(), function(data){
                    $("#cbx_item").html(data);
                    console.log(data);
                });
            });
        });
    </script>



    <style>
        .abs-center {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 60vh;
        }

        .form {
        width: 450px;
        }
</style>
</head>
<body>
<?php 
    include 'navbar.php';
?>
<div class="container">
    <div class="abs-center">
    <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
     
     <table class="table table-bordered table-responsive">
         <tr>
             <td>
        Seleccione:
             </td>

             <td>
                <select name="area_funcional" id="cbx_area_funcional" required>
                    <option value="">
                        Area Funcional
                    </option>

                    <?php while($row = $resultado->fetch_assoc()){?>
                    <option value="<?php echo $row['id'];?>">
                        <?php echo $row['area_funcional'];?>
                    </option>
                    <?php }?>
                </select>
             </td>  
         </tr>
         <tr>
             <td><label class="control-label">CI.</label></td>
             <td><input class="form-control" type="number" name="user_name" placeholder="Introduce el nombre" value="" required/></td>
         </tr>
     
         <tr>
             <td><label class="control-label">Nombre.</label></td>
             <td><input class="form-control" type="text" name="user_name" placeholder="Introduce el nombre" value="" required/></td>
         </tr>
     
         <tr>
             <td><label class="control-label">Apellido Paterno.</label></td>
             <td><input class="form-control" type="text" name="user_name" placeholder="Introduce el Apellido Paterno" value="" required /></td>
         </tr>
     
         <tr>
             <td><label class="control-label">Apellido Materno.</label></td>
             <td><input class="form-control" type="text" name="user_name" placeholder="Introduce el Apellido Materno" value="" required /></td>
         </tr>
     
         <tr>
             <td><label class="control-label">Celular Nro 1</label></td>
             <td><input class="form-control" type="number" name="user_name" placeholder="Introduce el numero" value="" required/></td>
         </tr>
         

         <tr>
             <td><label class="control-label">Celular Nro 2</label></td>
             <td><input class="form-control" type="number" name="user_name" placeholder="OPCIONAL" value=""/></td>
         </tr>

         <tr>
            <td>
                <label class="control-label">Cargos Disponibles:</label>
            </td>
             
            <td>
                <select name="position" id="cbx_position" required>
                    <option value="">Seleccione</option>
                </select>
            </td>
         </tr>
     
         <tr>
             <td><label class="control-label">Item:</label></td>
             <td>
                 <select name="item" id="cbx_item" required> 
                        <option value="">Auto Completable</option>
                 </select>
            </td>
         </tr>
         <tr>
             <!--<td><label class="control-label">Profile Img.</label></td>
             <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>-->
         </tr>
     <tr>
     <td>
     <button>Registrar</button>
        
    </td>    
     </tr>
         <!--
         <tr>
             <td>
                  <label for="">Sistemas :</label> 
             </td>
             <td>
                 <input type="checkbox" id="cbox2" value="second_checkbox" name="almacen">ALMACEN:
                 <input type="checkbox" id="cbox1" value="first_checkbox" name="sariri">SARIRI:
                 <input type="checkbox" id="cbox2" value="second_checkbox" name="almacen">ALMACEN:
             </td>

         </tr>-->
     </table>

    
     </form>
    </div>
</div>


 
</body>
</html>