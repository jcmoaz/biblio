<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 02/06/2016
 * Time: 0:04
 */
//Inicio la sesión
//al estar en index comprobaré la sesión para mostrar el formulario sencillo o datos de los clientes registrados.
session_start();

//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
/*if ($_SESSION["autentificado"]!="SI") {
    //si no existe, envio a la página de autentificacion
    header("Location: aplicacion.php");
    //ademas salgo de este script
    exit();
}*/
?> 