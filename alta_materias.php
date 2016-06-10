<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 04/06/2016
 * Time: 16:18
 */

		include("seguridad.php");			
		if (!(isset($_SESSION["autentificado"]))){
            echo "No estás autenticado<br>";
            echo "<a href='index.php'><img src='images/icoatras.jpg' width='17px' height='17px'>Volver</a>";
            header("location:index.php");
        }



		//if(isset($_SESSION["autentificado"])&& isset($_REQUEST["codgenalta"]) && isset($_REQUEST["nombrealta"]) && isset($_REQUEST["descripcionalta"])){
		if(isset($_SESSION["autentificado"])&& isset($_REQUEST["nombrealta"]) && isset($_REQUEST["descripcionalta"])){
            include("conectarbd.php");
            //$codgena=$_REQUEST["codgenalta"];
            $nombrea=$_REQUEST["nombrealta"];
            $descripciona=$_REQUEST["descripcionalta"];
            //$activoa=$_REQUEST["activoaalta"]; 

            //echo $codgena . ' ' . $nombrea . ' '. $descripciona;


            //$sql="insert into generos (nombre,descripcion,activo) values ('hola','adios','S')";
            $sql="insert into materias (codigo_materia,descripcion,activo) values ('$nombrea','$descripciona','S')";
            $res=mysqli_query($con,$sql);
            include("desconectarbd.php");
            //echo "Insertado 1 con éxito $nombrea $descripciona";//.·$nombrea. " ". $descripciona;	
            header("location:index.php?central=mm");
            //echo "Realizado con exito<a href='". $_SERVER['HTTP_REFERER'] . "'>Volver</a>";
        }
        else
        {
            //echo "no estas autentificado o falta algún dato de categor&iacute";
            //echo "<a href='mantcategorias.php'><img src='images/icoatras.jpg' width='17px' height='17px'>Volver</a>";
            header("location:index.php?central=mm");
            //include("logyregistro.php");
        }
	?>