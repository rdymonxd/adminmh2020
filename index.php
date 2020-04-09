<?php
	require('conexion.php');
	session_start();
	if(isset($_SESSION["login"])){
		header("Location: php/rrhh.php");
	}

	if(!empty($_POST)){
		$login = mysqli_real_escape_string($mysqli,$_POST['login']);
		$password = mysqli_real_escape_string($mysqli,$_POST['password']);
		$error = '';
		$pwd = md5($password);
		$sql = "SELECT username,pwd FROM t_usuario WHERE username='$login' AND pwd = '$pwd'";
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;
	
	if($rows > 0){
		$row = $result->fetch_assoc();
		$_SESSION['pwd'] = $row['pwd'];
		$_SESSION['login'] = $row['username'];
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (1 * 60);						
					
		header("location:php/rrhh.php");
		}else{
			echo "<div class='alert alert-danger mt-4' role='alert'>incorrects!";	
		//$error = "El login o la contraseña son incorrectos";		
	    }	
	
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>ATIC</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, 
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- /google fonts-->
</head>
<body>
    <h1>DGAA</h1>
    <div class=" w3l-login-form">
        <h2>Ministerio de Hidrocarburos</h2>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class=" w3l-form-group">
                <label>Username:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" placeholder="Username" name="login" required="required" />
                </div>
            </div>
            
            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" placeholder="Password" name="password" required="required" />
                </div>
            </div>
            
            <div class="forgot">
                <!--<a href="#">Forgot Password?</a>-->
                <!--<p><input type="checkbox">Remember Me</p>-->
            </div>
            
            <button type="submit">LOGIN</button>
        
        </form>
        <!--<p class=" w3l-register-p">Don't have an account?<a href="#" class="register"> Register</a></p>-->
    </div>
    <footer>
        <p class="copyright-agileinfo"> &copy;Area de Tecnologia e Informacion <a href="https://www.hidrocarburos.gob.bo/">MH</a></p>
    </footer>
</body>
</html>