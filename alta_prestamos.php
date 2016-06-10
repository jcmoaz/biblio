<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 07/06/2016
 * Time: 1:53
 */

		include("seguridad.php");
		if (!(isset($_SESSION["autentificado"]))){
            echo "No estás autenticado<br>";
            echo "<a href='index.php'>Volver</a>";
        }


		if(isset($_SESSION["autentificado"])&& isset($_REQUEST["emailalta"]) && isset($_REQUEST["codigo_libroalta"]) && isset($_REQUEST["numejemplaralta"]) && isset($_REQUEST["fecha_alta_alta"]) && isset($_REQUEST["fecha_prev_dev_alta"]) && isset($_REQUEST["fecha_real_dev_alta"])){
            include("conectarbd.php");
            $emaila=$_REQUEST["emailalta"];
            $codigo_libroaltaa=$_REQUEST["codigo_libroalta"];
            $numejemplaraltaa=$_REQUEST["numejemplaralta"];
            $fecha_alta_altaa=$_REQUEST["fecha_alta_alta"];
            $fecha_prev_dev_altaa=$_REQUEST["fecha_prev_dev_alta"];
            $fecha_real_dev_altaa=$_REQUEST["fecha_real_dev_alta"];

            $sql="insert into cabprestamos (email,codigo_libro,numejemplar,fecha_alta,fecha_prev_dev,fecha_real_dev) values ('$emaila','$codigo_libroaltaa','$numejemplaraltaa','$fecha_alta_altaa','$fecha_prev_dev_altaa','$fecha_real_dev_altaa')";
            $res=mysqli_query($con,$sql);
            include("desconectarbd.php");
            //echo "Insertado 1 con éxito".$_REQUEST["emailalta"];
            header("location:index.php?central=mpr");
            //echo "Realizado con exito<a href='". $_SERVER['HTTP_REFERER'] . "'>Volver</a>";
        }
        else
        {
            echo "no estas autentificado o falta algún dato de usuario";
            //include("logyregistro.php");
        }
	?>