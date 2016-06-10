<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 04/06/2016
 * Time: 16:29
 */
		//include("seguridad.php");		
		
		if(isset($_SESSION["autentificado"])){
            include("conectarbd.php");
            //voy a mostrar todas las categorias.
            $sql="select * from materias";
            $res=mysqli_query($con,$sql);
            $numfilas=mysqli_num_rows($res);

            if($numfilas>0){
                //Existen materias, las mostraré
                echo "<h1 align=center>Materias</h1><br>";
                echo "<table align='center' class='pequena'><tr><td>C&oacutedigo</td><td>Descripci&oacuten</td><td>Activo</td><td>Eliminar</td><td>Modificar</td></tr>";
                $fila=mysqli_fetch_array($res);
                while($fila){
                    echo"<tr><td>".$fila['codigo_materia']."</td><td>".$fila['descripcion']."</td><td>".$fila['activo']."</td><td><a href=baja_materias.php?codmat=".$fila['codigo_materia']."><img src='images/icomenos.png' width='20px' height='20px'></a></td><td><a href=index.php?central=om&codmatalta=".$fila['codigo_materia']."><img src='images/icoeditar.png' width='20px' height='20px'></a></td></tr>";
                    $fila=mysqli_fetch_array($res);
                }  //while
                echo "</table>";
            }//numfilas
            include("desconectarbd.php");

            echo '<br>
			<h1 align="center">Alta Materias</h1>
			<form id="regalta4" method="post" action="alta_materias.php">
				<table align="center">
			<!--<tr><td><label for="codgenalta">C&oacutedigo Categor&iacutea</label></td><td><input type="text" name="codgenalta" /></td></tr>-->
				<tr><td><label for="nombrealta">Nombre </label></td><td><input type="text" name="nombrealta"></td></tr>
				<tr><td><label for="descripcionalta">Descripci&oacuten</label></td><td><input type="text" name="descripcionalta" /></td></tr>		
				<tr><td><input type="submit" value="Nueva Materia"></td></tr>
				</table>
			</form><br>	';

        }
        else
        {
            header("Location:index.php");
            //echo "no estas autentificado";
            //include("logyregistro.php");
        }	
?>	

	<?php //include('includecabecera.php'); ?>

	
	<?php
	//echo "<a href='". $_SERVER['HTTP_REFERER'] . "'>Volver</a>";
	//echo "<a href='index.php'><img src='images/icoatras.jpg' width='17px' height='17px'>Volver</a>";
	?>
	<?php //include('includepie.php'); ?>

	

