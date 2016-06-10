<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 02/06/2016
 * Time: 3:08
 */
if(!defined("HOSTNAME")) define("HOSTNAME","193.144.125.84");
if(!defined("DATABASE")) define("DATABASE","a009233_dbbiblioteca1");
if(!defined("USER_DB")) define("USER_DB","a009233_root");
if(!defined("PASSWORD_DB")) define("PASSWORD_DB","a12345678");

$con= mysqli_connect(HOSTNAME,USER_DB,PASSWORD_DB);
if (!$con || !mysqli_select_db($con,DATABASE)){
    die("Error en la conexion de la BD: ".mysql_error());
}
//else{
//	echo "conexión correcta";
//}