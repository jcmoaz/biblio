<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 04/06/2016
 * Time: 11:24
 */
		//include("seguridad.php");
		if(isset($_SESSION["autentificado"])){
            include("conectarbd.php");
            //voy a mostrar todos los trabajadores activos.
            $sql="select * from usuarios where tipo='E'";
            $res=mysqli_query($con,$sql);
            $numfilas=mysqli_num_rows($res);

            if($numfilas>0){
                //Existen trabajadores, los mostraré
                echo "<h1 align=center>Trabajadores</h1><br>";
                echo "<table align='center' class='pequena'><tr><td>Email</td><td>Password</td><td>Nombre</td><td>Apellido1</td><td>Apellido2</td><td>Direcci&oacuten</td><td></td><td>Poblaci&oacuten</td><td></td><td>Tel&eacutefono</td><td></td><td>Act.</td><td>Eli.</td><td>Mod.</td></tr><tr><td></td><td></td><td></td><td></td><td></td><td>CPostal</td><td></td><td>Provincia</td><td></td><td>DNI</td><td></td><td></td><td></td><td></td></tr>";
                $fila=mysqli_fetch_array($res);
                while($fila){
                    echo"<tr><td>".$fila['email']."</td><td>".$fila['contrasenya']."</td><td>".$fila['nombre']."</td><td>".$fila['apellido1']."</td><td>".$fila['apellido2']."</td><td>".$fila['direccion']."</td><td></td><td>".$fila['poblacion']."</td><td></td><td>".$fila['telefono']."</td><td></td><td>".$fila['activo']."</td><td><a href=baja_trabajadores.php?email=".$fila['email']."><img src='images/icomenos.png' width='20px' height='20px'></a></td><td><a href=index.php?central=ot&emailalta=".$fila['email']."><img src='images/icoeditar.png' width='20px' height='20px'></a></td></tr>";
                    echo"<tr><td></td><td></td><td></td><td></td><td></td><td>".$fila['cpostal']."</td><td></td><td>".$fila['provincia']."</td><td></td><td>".$fila['dni']."</td><td></td><td></td><td></td><td></td></tr>";
                    $fila=mysqli_fetch_array($res);
                }  //while
                echo "</table>";
            }//numfilas
            include("desconectarbd.php");

            echo '<h1 align="center">Alta trabajadores</h1>
			<form id="regalta2" method="post" action="alta_trabajadores.php">
			<table align="center">
			<tr><td><label for="emailalta">Email</label></td><td><input type="text" name="emailalta" /></td></tr>
			<tr><td><label for="passwordalta">Password</label></td><td><input type="password" name="passwordalta"></td></tr>
			<tr><td><label for="nombrealta">Nombre</label></td><td><input type="text" name="nombrealta" /></td></tr>
			<tr><td><label for="apellido1alta">Primer Apellido</label></td><td><input type="text" name="apellido1alta" /></td></tr>
			<tr><td><label for="apellido2alta">Segundo Apellido</label></td><td><input type="text" name="apellido2alta" />	</td></tr>
			<tr><td><label for="direcalta">Direcci&oacuten</label></td><td><input type="text" name="direcalta" /></td></tr>
			<tr><td><label for="cpostalalta">Cod.Postal</label></td><td><input type="text" name="cpostalalta" /></td></tr>
			<tr><td><label for="localidadalta">Localidad</label></td><td><input type="text" name="localidadalta" /></td></tr>
			<tr><td><label for="provinciaalta">Provincia</label></td><td><input type="text" name="provinciaalta" /></td></tr>
			<tr><td><label for="telefonoalta">Tel&eacutefono</label></td><td><input type="text" name="telefonoalta" /></td></tr>
			<tr><td><label for="dnialta">DNI</label></td><td><input type="text" name="dnialta" />	</td></tr>	
			<tr><td><input type="submit" value="Nuevo trabajador"></td></tr>
			</table>
			</form>	<br>	';

        }
        else
        {
            //echo "no estas autentificado";
            header("Location:index.php");

        }
?>