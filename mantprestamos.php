<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 07/06/2016
 * Time: 1:40
 */

		//include("seguridad.php");
		if(isset($_SESSION["autentificado"])){
            include("conectarbd.php");
            //voy a mostrar todos los trabajadores activos.
            $sql="select * from cabprestamos";
            $res=mysqli_query($con,$sql);
            $numfilas=mysqli_num_rows($res);

            if($numfilas>0){
                //Existen prestamos, los mostraré
                echo "<h1 align=center>Prestamos</h1><br>";
                echo "<table align='center' class='pequena'><tr><td>Prestamo</td><td>Usuario</td><td>codigo_libro</td><td>ejemplar</td><td>Fecha Prestamo</td><td>F.Dev.Estimada</td><td>F.Real.Devolución</td><td></td><td></td><td></td><td></td></tr>";
                $fila=mysqli_fetch_array($res);
                while($fila){
                    echo"<tr><td>".$fila['numprestamo']."</td><td>".$fila['email']."</td><td>".$fila['codigo_libro']."</td><td>".$fila['numejemplar']."</td><td>".$fila['fecha_alta']."</td><td>".$fila['fecha_prev_dev']."</td><td></td><td>".$fila['fecha_real_dev']."</td><td></td><td></td><td></td><td></td><td><a href=baja_trabajadores.php?email=".$fila['email']."><img src='images/icomenos.png' width='20px' height='20px'></a></td><td><a href=index.php?central=ot&emailalta=".$fila['email']."><img src='images/icoeditar.png' width='20px' height='20px'></a></td></tr>";
                    echo"<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
                    $fila=mysqli_fetch_array($res);
                }  //while
                echo "</table>";
            }//numfilas
            include("desconectarbd.php");

            echo '<h1 align="center">Alta prestamos</h1>
			<form id="regalta2" method="post" action="alta_prestamos.php">
			<table align="center">
			<tr><td><label for="emailalta">Email</label></td><td><input type="text" name="emailalta" /></td></tr>
			<tr><td><label for="codigo_libroalta">codigo_libro</label></td><td><input type="text" name="codigo_libroalta" /></td></tr>
            <tr><td><label for="numejemplaralta">numero_ejemplar</label></td><td><input type="text" name="numejemplaralta" /></td></tr>
			<tr><td><label for="fecha_alta_alta">Fecha Alta</label></td><td><input type="text" name="fecha_alta_alta" id="datepicker"></td></tr>
			<tr><td><label for="fecha_prev_dev_alta">Fecha Prevista Devolucion</label></td><td><input type="text" name="fecha_prev_dev_alta" /></td></tr>
			<tr><td><label for="fecha_real_dev_alta">Fecha Real Devolucion</label></td><td><input type="text" name="fecha_real_dev_alta" /></td></tr>
			<tr><td><input type="submit" value="Nuevo Préstamos"></td></tr>
			</table>
			</form>	<br>	';

        }
        else
        {
            //echo "no estas autentificado";
            header("Location:index.php");

        }
?>