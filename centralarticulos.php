<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 02/06/2016
 * Time: 1:41
 */

echo "Central";


/*$numfilasamostrar = 4;
if (isset($_GET["desplazamiento"]))
    $desplazamiento = $_GET["desplazamiento"];
else $desplazamiento = 0;


if (isset($_REQUEST["descat"]))
    $descategoria= $_REQUEST['descat'];
else $descategoria= " ";

if (isset($_REQUEST["cat"]))
    $concatena= "&cat=".$_REQUEST['cat'];
else {$concatena= " ";$descategoria="Ofertas";}

include("conectarbd.php");


if (isset($_REQUEST["cat"])) {
    $sql="select * from discos where genero='".$_REQUEST["cat"]."' and activo = 'S' limit $desplazamiento, $numfilasamostrar";
    $sqltotal="select * from discos where genero='".$_REQUEST["cat"]."' and activo = 'S'";
} else{
    $sql="select * from discos where oferta='S' and activo = 'S' limit $desplazamiento, $numfilasamostrar";
    $sqltotal="select * from discos where oferta='S' and activo = 'S'";
}
	$restotal=mysqli_query($con,$sqltotal);
	$numfilastotal=mysqli_num_rows($restotal);


	$res=mysqli_query($con,$sql);
	$numfilas=mysqli_num_rows($res);
	$j=1;

	if($numfilas>0){
        //Existen discos de ese genero
        echo "<h3 align='center'>$descategoria</h5>";
        echo "<table width=500px>";
        $fila=mysqli_fetch_array($res);
        while($fila){
            $codigo_disco= $fila["codigo_disco"];
            $titulo= $fila["titulo"];
            $autor= $fila["autor"];
            $codigo_disco= $fila["codigo_disco"];
            $titulo= $fila["titulo"];
            $autor= $fila["autor"];
            $genero= $fila["genero"];
            $anyoedicion= $fila["anyoedicion"];
            $duracion= $fila["duracion"];
            $precio= $fila["precio"];
            $portada= $fila["portada"];
            //echo "<tr><td>Referencia: ". $fila["codigo_disco"] ." <br> ". $fila["titulo"] ." <br> PVP". $fila["precio"] ."</td><td><img src='fotosdiscos/".$fila["portada"]."' width='200px' height='200px' ></img></td><td><a href=comprar.php?codigo=".$fila["codigo_disco"]."&pvp=".$fila["precio"].">Comprar</a></td></tr>";

            if (($j % 2) !=0) //impar
                echo "<tr>";

            echo "<td align='center'>Referencia: ". $fila["codigo_disco"] ."<br><img src='fotosdiscos/".$fila["portada"]."' width='200px' height='200px' ></img> <br> ". $fila["titulo"] ." <br> ". $fila["precio"] ." €<br><a class='enlpeq' href=comprar.php?codigo=".$fila["codigo_disco"]."&pvp=".$fila["precio"].">Añadir a cesta</a><br><br></td>";

            if (($j % 2) ==0) //par
                echo "</tr>";

            $j++;
            $fila=mysqli_fetch_array($res);
        }

        if (($numfilas % 2) !=0) //impar
            echo "</tr><tr>";


        if($desplazamiento >0){
            $prev= $desplazamiento - $numfilasamostrar;
            $url= $_SERVER["PHP_SELF"] . "?desplazamiento=$prev$concatena&descat=$descategoria";
            echo "<td align='right'><A HREF='$url'>Página anterior</A></td>";
        }
        if($numfilastotal > ($desplazamiento + $numfilasamostrar)) {
            $prox= $desplazamiento + $numfilasamostrar;
            $url= $_SERVER["PHP_SELF"] . "?desplazamiento=$prox$concatena&descat=$descategoria";
            echo "<td align='left'><A HREF='$url'>Próxima página</A></td>";
        }

        echo "</table>";
        include("desconectarbd.php");



        //echo $numfilastotal . "despl ". $desplazamiento . " ". $numfilasamostrar;


        //header ("Location: index.php");
    }
    else
    {
        //si no existe le mando otra vez a la portada
        echo "<h3 align='center'>Categoría sin discos</h3>";
        include("desconectarbd.php");
        //header("Location: index.php?cat=99");
    }//else*/


?>