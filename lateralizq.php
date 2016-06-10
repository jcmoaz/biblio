<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 02/06/2016
 * Time: 1:34
 */
			include("conectarbd.php");
            echo "lateral izq";
/*			//voy a mostrar todas las categorias.
			$sql="select * from generos where activo = 'S'";
			$res=mysqli_query($con,$sql);
			$numfilas=mysqli_num_rows($res);

			if($numfilas>0){
                //Existen categorias, las mostraré
                echo "<ul class='menu2'>";
                $fila=mysqli_fetch_array($res);
                while($fila){
                    echo"<li><a href='index.php?cat=".$fila['codigo_genero']."&descat=".$fila['nombre']."' >".$fila['nombre']."</a></li>";
                    $fila=mysqli_fetch_array($res);
                }  //while
                echo"<li><a href='index.php?descat=Ofertas'>Ofertas</a></li>";
                echo "</ul>";
            }//numfilas*/
			include("desconectarbd.php");

	?>