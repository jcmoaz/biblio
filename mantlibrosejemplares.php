<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 06/06/2016
 * Time: 18:50
 */

		//include("seguridad.php");
		if(isset($_SESSION["autentificado"])){
            include("conectarbd.php");

            $sqltipo="select * from usuarios where email='".$_SESSION["autentificado"]."'";
            $restipo=mysqli_query($con,$sqltipo);
            $numfilastipo=mysqli_num_rows($restipo);
            $tipo='C';
            if($numfilastipo==1){
                //Usuario existente. Obtengo su tipo.
                $fila=mysqli_fetch_array($restipo);
                while($fila){
                    $tipo= $fila["tipo"];
                    $fila=mysqli_fetch_array($restipo);
                }
            }





            //Dependiendo del tipo se mostrará solo sus pedidos (C) o todos los pedidos.
            /*if ($tipo=='C')
                $sql="select * from cabpedido where email='".$_SESSION["autentificado"]."' order by email,numpedido";
            else
                $sql="select * from cabpedido  order by email,numpedido";
            */
?>
            
            

            <form action="auxiliar.php" method="get">
                <input type="text" name="busqueda">
                <input type="submit" value="Buscar">
            </form>

<?php

            if (isset($_REQUEST["busqueda"])){
                $sql="select * from libros where codigo_libro=".$_REQUEST["busqueda"]." order by codigo_libro";
            }
            else{$sql="select * from libros  order by codigo_libro";}


            //$sql="select * from libros  order by codigo_libro";

            $res=mysqli_query($con,$sql);
            $numfilas=mysqli_num_rows($res);


            if($numfilas>0){
                //Existen pedidos de dicho usuario
                include("includecabecera.php");
                echo "<h1 align='center'>Mantenimiento de Libros</h1><br>";
                echo "<table align='center' class='pequena'>";
                $fila=mysqli_fetch_array($res);
                while($fila){
                    $selr='';$selp='';$sele='';$seln='';
                    //R recibido, P en preparación, E enviado, N Entregado
                    /*switch ($fila["estado"]) {
                        case 'R':
                            $desestado = 'Recibido';
                            $selr = 'selected';
                            break;
                        case 'P':
                            $desestado = 'En Preparaci&oacuten';
                            $selp = 'selected';
                            break;
                        case 'E':
                            $desestado = 'Enviado';
                            $sele = 'selected';
                            break;
                        case 'N':
                            $desestado = 'Entregado';
                            $seln = 'selected';
                            break;
                    }*/


                    echo "<tr><td> XXX </td><td>Libro</td><td>". $fila["codigo_libro"] ."</td><td>Titulo</td><td>". $fila["titulo"] ."</td></tr><tr><td><a href=modifica_libros.php?=".$fila['codigo_libro']."><img src='images/icoeditar.png' width='20px' height='20px'></a></td><td>Activo ".$fila["activo"] ."</td><td><a href=baja_libros.php?numped=".$fila['codigo_libro']."><img src='images/icomenos.png' alt='baja pedido' width='20px' height='20px'></a></td></tr>";
                    $totalarticulo=0;
                    $totalpedido=0;


                    echo "<tr><td>Libro</td><td>Ejemplar</td><td>Nota</td><td>Activo</td></tr>";
                    $sql2="select ejemplares.codigo_libro, ejemplares.numejemplar, ejemplares.nota,ejemplares.activo from libros,ejemplares where libros.codigo_libro ='".$fila["codigo_libro"]."' and libros.codigo_libro = ejemplares.codigo_libro";

                    $res2=mysqli_query($con,$sql2);
                    $numfilas2=mysqli_num_rows($res2);
                    if($numfilas2>0){
                        $fila2=mysqli_fetch_array($res2);
                        while($fila2){
                            echo "<tr><td>". $fila2["codigo_libro"] ."</td><td>". $fila2["numejemplar"] ." </td><td>". $fila2["nota"] ." </td><td>".$fila2["activo"] ."</td><td><a href=baja_ejemplar.php?codigo_libro=".$fila['codigo_libro']."&ejemplar=".$fila2['numejemplar']."><img src='images/icomenos.png' alt='baja ejemplar' width='20px' height='20px'></a></td></tr>";
                            /*if ($fila2["activo"]=='S'){
                                $totalarticulo=$totalarticulo+ $fila2["unidades"];
                                $totalpedido=$totalpedido+($fila2["unidades"]*$fila2["precio"]);}*/
                            $fila2=mysqli_fetch_array($res2);
                        }
                    } //numfilas2
                    //echo "<tr><td></td><td colspan=2>Total Pedido</td><td>$totalpedido</td><td>$totalarticulo</td></tr><tr><td><br></td></tr>";
                    $fila=mysqli_fetch_array($res);
                }  //while
                echo "</table>";
                
            }//numfilas
            else{
                include("includecabecera.php");
                echo "<h1 align='center'>Mantenimiento de Libros</h1><br>";
                echo "Ningun libro encontrado<br>";
            }


            include("desconectarbd.php");
            //echo "<a href='index.php'><img src='images/icoatras.jpg' width='17px' height='17px'>Volver</a>";
            include("includepie.php");

        }
        else
        {
            //echo "no estas autentificado";
            include("index.php");
        }
?>