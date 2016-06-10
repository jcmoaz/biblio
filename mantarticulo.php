<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 04/06/2016
 * Time: 11:05
 */

		//include("seguridad.php");
		if(isset($_SESSION["autentificado"])){
            include("conectarbd.php");
            //voy a mostrar todos los artículos.
            $sql="select libros.codigo_libro, libros.titulo, libros.autor,libros.genero, libros.anyoedicion,libros.duracion, libros.precio, libros.portada, libros.oferta, libros.activo,generos.nombre from libros,generos where libros.genero = generos.codigo_genero order by libros.codigo_libro";
            $res=mysqli_query($con,$sql);
            $numfilas=mysqli_num_rows($res);

            if($numfilas>0){
                //Existen artículos, los mostraré
                echo "<h1 align=center>libros</h1>";
                echo "<table align='center' class='pequena'><tr><td>Codigo</td><td>T&iacutetulo</td><td>Autor</td><td>Categor&iacutea</td><td>Edici&oacuten</td><td>Duraci&oacute</td><td>Precio</td><td>Portada</td><td>Oferta</td><td>Activo</td><td>Eliminar</td><td>Modificar</td></tr>";
                $fila=mysqli_fetch_array($res);
                while($fila){
                    echo"<tr><td>".$fila['codigo_libro']."</td><td>".$fila['titulo']."</td><td>".$fila['autor']."</td><td>".$fila['nombre']."</td><td>".$fila['anyoedicion']."</td><td>".$fila['duracion']."</td><td>".$fila['precio']."</td><td>".$fila['portada']."</td><td>".$fila['oferta']."</td><td>".$fila['activo']."</td><td><a href=baja_articulos.php?codlibro=".$fila['codigo_libro']."><img src='images/icomenos.png' width='20px' height='20px'></a></td><td><a href=index.php?central=oa&codlibroalta=".$fila['codigo_libro']."><img src='images/icoeditar.png' width='20px' height='20px'></a></td></tr>";
                    $fila=mysqli_fetch_array($res);
                }  //while
                echo "</table>";
            }//numfilas
            include("desconectarbd.php");

            /*if(isset(_$REQUEST["error"])){
                if(_$REQUEST["error"]==1)){
                echo "Error en la subida de archivo, debe ser jpg,gif o png<br>";
            }}*/
            ?>

            <h1 align="center">Alta libros</h1>
            <form id="regalta3" method="post" action="alta_articulos.php" enctype="multipart/form-data">
                <table align="center">
                    <!--<tr><td><label for="coddiscoalta">C&oacutedigo Disco</label></td><td><input type="text" name="coddiscoalta" /></td></tr>-->
                    <tr><td><label for="tituloalta">T&iacutetulo </label></td><td><input type="tituloalta" name="tituloalta"></td></tr>
                    <tr><td><label for="autoralta">Autor</label></td><td><input type="text" name="autoralta" /></td></tr>
                    <!--<tr><td><label for="generoalta">G&eacutenero </label></td><td><input type="text" name="generoalta" /></td></tr>-->
                    <tr><td><label for="generoalta">G&eacutenero </label></td><td>
                            <select name="generoalta">

                                <?php
                                //if(isset($_SESSION["autentificado"])){
                                include("conectarbd.php");
                                //voy a mostrar todos los generos activos.
                                $sql="select * from generos where activo ='S' ";
                                $res=mysqli_query($con,$sql);
                                $numfilas=mysqli_num_rows($res);
                                $i=0;

                                if($numfilas>0){
                                    //Existen generos, rellenaré la lista
                                    $fila=mysqli_fetch_array($res);
                                    while($fila){
                                        if($i==0){echo"<option value=".$fila['codigo_genero']." selected >".$fila['nombre']." </option>";	} //selecciono el primer genero
                                        else {echo"<option value=".$fila['codigo_genero'].">".$fila['nombre']."</option>";	}
                                        $i++;
                                        $fila=mysqli_fetch_array($res);
                                    }  //while

                                }//numfilas
                                include("desconectarbd.php");

                                /*}
                                else
                                {
                                    echo "no estas autentificado";
                                    include("logyregistro.php");
                                }*/
                                ?>

                            </select></td></tr>
                    <tr><td><label for="anyoedicionalta">Edici&oacuten</label></td><td><input type="text" name="anyoedicionalta" />	</td></tr>
                    <tr><td><label for="duracionalta">Duraci&oacuten</label></td><td><input type="text" name="duracionalta" /></td></tr>
                    <tr><td><label for="precioalta">Precio</label></td><td><input type="text" name="precioalta" /></td></tr>
                    <!--<tr><td><label for="portadaalta">Portada</label></td><td><input type="text" name="portadaalta" /></td></tr>-->
                    <tr><td><label for="portadaalta">Portada</label></td><td><input type="file" name="miarchivo"></td></tr>
                    <!--<tr><td><label for="ofertaalta">Oferta</label></td><td><input type="text" name="ofertaalta" /></td></tr>-->
                    <tr><td><label for="ofertaalta">Oferta</label></td><td><input type="radio" name="ofertaalta" value="S" /> Si
                            <input type="radio" name="ofertaalta" value="N" checked /> No</td></tr>
                    <tr><td><input type="submit" value="Nuevo Libro"></td></tr>
                </table>
            </form>


            <?php

            if(isset($_REQUEST["error"]) && isset($_REQUEST["descerror"])) echo "<h4>Error".$_REQUEST['descerror']."</h4>";

        }
        else
        {
            //echo "no estas autentificado";
            header("location:index.php");
            //include("logyregistro.php");
        }
?>
