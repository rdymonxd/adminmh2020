<?php

$login = htmlentities(addslashes($_POST['login']));
$password = htmlentities(addslashes($_POST['password']));

$contador=0;

require("conexion.php");

if($sql = "SELECT * FROM t_usuario WHERE login= :login"){

$resultado = $base->prepare($sql);

$resultado->execute(array(":login"=>$login));
//$contador=0;
while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
	$name = $registro['name'];
	$cifuncionario = $registro['ci'];
        if(password_verify($password, $registro['password']) && $registro['tipo_usuario'] =='USUARIO' && $name){
                $contador++;
		if($contador > 0){
        		session_start();
        		$_SESSION['usuario']=$_POST['login'];
				$_SESSION['funcionario']=$cifuncionario;
				$_SESSION['nombre']=$name;
        			header("location:php_usuario/protegido_usuario.php");
        		}else{
                		header("location:index.php");
        		}
        //$resultado->closeCursor();
        }elseif(password_verify($password, $registro['password']) && $registro['tipo_usuario'] =='ADMINISTRADOR' && $name){
		$contador++;
                if($contador > 0){
                        session_start();
                        $_SESSION['usuario']=$_POST['login'];
                        $_SESSION['funcionario']=$cifuncionario;
                        $_SESSION['nombre']=$name;
                        header("location:php_administrador/protegido_administrador.php");
                }else{
                        header("location:index.php");
                }
        //$resultado->closeCursor();
	}else{
		header("location:index.php");
	}
//      echo "Nombre: " . $registro['nombre'] . "Login" . $registro['ci'];
}
}
echo "<script>alert('Algo sucedio mal')</script>";
echo "<script>location.href='index.php'</script>"; 
?>

