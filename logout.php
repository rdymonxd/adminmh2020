<?php
//Inicia una nueva sesion o reanda la existencia
	session_start();
//Destruye toda la informacion registrada de una sesion
	session_destroy();
	header('location: index.php');
?>
