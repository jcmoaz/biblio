<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 02/06/2016
 * Time: 0:56
 */
if(!defined("HOSTNAME")) define("HOSTNAME","localhost");
if(!defined("DATABASE")) define("DATABASE","dbbiblioteca");
if(!defined("USER_DB")) define("USER_DB","root");
if(!defined("PASSWORD_DB")) define("PASSWORD_DB","");

$con= mysqli_connect(HOSTNAME,USER_DB,PASSWORD_DB);
if (!$con || !mysqli_select_db($con,DATABASE)){
    die("Error en la conexion de la BD: ".mysql_error());
}
//else{
//	echo "conexión correcta";
//}
?>