<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 04/06/2016
 * Time: 11:25
 */
		include("seguridad.php");
		if (!(isset($_SESSION["autentificado"]))){
            echo "No estás autenticado<br>";
            echo "<a href='index.php'>Volver</a>";
        }


		if(isset($_SESSION["autentificado"])&& isset($_REQUEST["emailalta"]) && isset($_REQUEST["passwordalta"]) && isset($_REQUEST["nombrealta"]) && isset($_REQUEST["apellido1alta"]) && isset($_REQUEST["apellido2alta"]) && isset($_REQUEST["dnialta"]) && isset($_REQUEST["direcalta"]) && isset($_REQUEST["cpostalalta"]) && isset($_REQUEST["localidadalta"]) &&  isset($_REQUEST["provinciaalta"]) && isset($_REQUEST["telefonoalta"])){
            include("conectarbd.php");
            $emaila=$_REQUEST["emailalta"];
            $passworda=$_REQUEST["passwordalta"];
            $nombrea=$_REQUEST["nombrealta"];
            $apellido1a=$_REQUEST["apellido1alta"];
            $apellido2a=$_REQUEST["apellido2alta"];
            $direcciona=$_REQUEST["direcalta"];
            $cpostala=$_REQUEST["cpostalalta"];
            $localidada=$_REQUEST["localidadalta"];
            $provinciaa=$_REQUEST["provinciaalta"];
            $telefonoa=$_REQUEST["telefonoalta"];
            $dnia=$_REQUEST["dnialta"];

            $sql="insert into usuarios values ('$emaila','$passworda','$nombrea','$apellido1a','$apellido2a','$direcciona','$cpostala','$localidada','$provinciaa','$telefonoa','$dnia','E','S')";
            $res=mysqli_query($con,$sql);
            include("desconectarbd.php");
            //echo "Insertado 1 con éxito".$_REQUEST["emailalta"];
            header("location:index.php?central=mt");
            //echo "Realizado con exito<a href='". $_SERVER['HTTP_REFERER'] . "'>Volver</a>";
        }
        else
        {
            echo "no estas autentificado o falta algún dato de usuario";
            //include("logyregistro.php");
        }
	?>