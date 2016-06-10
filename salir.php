<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 02/06/2016
 * Time: 0:34
 */

session_start();
//borramos explicitamente la info contenido en el array SESSION
$_SESSION=array();
// Borrar la cookie que almacena la session
if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(),'', time() - 42000);
}
//destruyo sesion
session_destroy();
header("location:index.php");
?>
<!--
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Has salido de la aplicación</title>
</head>
<body>
	Gracias por tu acceso al ejemplo de DAW<br><br>
	<a href="index.php">Formulario de autentificación</a>
</body>
</html> 
!-->