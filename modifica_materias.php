<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 04/06/2016
 * Time: 16:57
 */

	//include("seguridad.php");
		if(isset($_SESSION["autentificado"])&& isset($_REQUEST["codgenalta"])){

            if(isset($_REQUEST["validar"]) && $_REQUEST["validar"]=="1"){
                // en caso de haber realizado algún cambio en el formulario paso a updatear.
                include("conectarbd.php");


                $codmata=$_REQUEST["codmatalta"];
                $descripciona=$_REQUEST["descripcionalta"];
                $activoa=$_REQUEST["activoalta"];

                $sql="update materias set descripcion='$descripciona', activo='$activoa' where codigo_genero='$codmata'";
                $res=mysqli_query($con,$sql);
                include("desconectarbd.php");
                header("Location:index.php?central=mm");
                //echo "Modificación realizada con exito<a href='". $_SERVER['HTTP_REFERER'] . "'>Volver</a>";

            }else
            {
                // relleno el formulario con los datos de la materia seleccionada.
                include("conectarbd.php");
                $sql="select * from materias where codigo_materia='".$_REQUEST["codmatalta"]."'";
                $res=mysqli_query($con,$sql);
                $numfilas=mysqli_num_rows($res);

                if($numfilas>0){
                    //Obtengo los datos de dicha categoria
                    $fila=mysqli_fetch_array($res);
                    while($fila){
                        $codmata=$fila["codigo_materia"];
                        $descripciona=$fila["descripcion"];
                        $activoa=$fila["activo"];
                        $fila=mysqli_fetch_array($res);
                    }
                }
                include("desconectarbd.php");
                //header("Location:$_SERVER['HTTP_REFERER']");
                //echo "Recuperados con exito<a href='". $_SERVER['HTTP_REFERER'] . "'>Volver</a>";
            }

            $valoractivoS='';
            $valoractivoN='checked';
            if ($activoa=='S'){ $valoractivoS='checked'; $valoractivoN='';}



            echo '<h1 align="center">Modificar Materia</h1><form id="regalta5" method="post" action="index.php?central=om&validar=1">';
            echo '<table align="center"><tr><td><label for="codgenalta">C&oacutedigo</label></td><td><input readonly="readonly" type="text" name="codmatalta" value='.$codmata.'></td></tr>
			<tr><td><label for="descripcionalta">Descripci&oacuten</label></td><td><input type="text" name="descripcionalta" value="'.$descripciona.'"></td></tr>
			<tr><td><label for="activoalta">Activo</label></td><td><input type="radio" name="activoalta" value="S" '.$valoractivoS. ' /> Si
			<input type="radio" name="activoalta" value="N" '.$valoractivoN. ' /> No</td></tr>
			<tr><td><input type="submit" value="Modificar Materia"></td></tr></table>		
			</form>';

        }
        else
        {
            //echo "no estas autentificado o la categoria a modificar es incorrecto<br>";
            //echo "<a href='index.php'>Volver</a>";
            header("location:index.php");

        }
	?>



	<?php //include('includecabecera.php'); ?>

    <!-- <h1 align="center">Modificar Categorias</h1> -->
<?php
/*	echo '<form id="regalta5" method="post" action="modifica_categorias.php?validar=1">';
	echo '<table align="center"><tr><td><label for="codgenalta">C&oacutedigo</label></td><td><input type="text" name="codgenalta" value='.$codgena.'></td></tr>
	<tr><td><label for="nombrealta">Nombre</label></td><td><input type="text" name="nombrealta" value="'.$nombrea.'"></td></tr>
	<tr><td><label for="descripcionalta">Descripci&oacute</label></td><td><input type="text" name="descripcioalta" value="'.$descripciona.'"></td></tr>
		<tr><td><label for="activoalta">Activo</label></td><td><input type="text" name="activoalta" value="'.$activoa.'"></td></tr>
		<tr><td><input type="submit" value="Modificar Categoria"></td></tr></table>

	</form><a href="mantcategorias.php">Volver</a>';*/
	?>

	<?php //include('includepie.php'); ?>