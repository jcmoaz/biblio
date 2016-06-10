<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 02/06/2016
 * Time: 0:40
 */
//vemos si el usuario y contraseña es valido
if (isset($_REQUEST["emaill"]) && isset($_REQUEST["passl"])){
    //compruebo si el usuario y es password es valido
    include("conectarbd.php");
    $sql="select * from usuarios where email='".$_REQUEST["emaill"]."' and contrasenya ='".$_REQUEST["passl"]."'";
    $res=mysqli_query($con,$sql);
    $numfilas=mysqli_num_rows($res);
    //echo $numfilas;
    if($numfilas==1){
        //Usuario existente. Obtengo su nombre y defino una sesion.
        $fila=mysqli_fetch_array($res);
        while($fila){
            $usuario= $fila["nombre"]." ".$fila["apellido1"];
            $nombreusuario=$_REQUEST["emaill"];
            $fila=mysqli_fetch_array($res);
        }
        include("desconectarbd.php");
        session_start();
        $_SESSION["autentificado"]= $nombreusuario;
        $_SESSION["nombreusu"]= $usuario;

        //header ("Location: aplicacion.php");		
        //echo "se encuentra";
        header ("Location: index.php");
    }
    else
    {
        //si no existe le mando otra vez a la portada
        include("desconectarbd.php");
        //echo "no se encuentra";
        header("Location: index.php?errorlogueo=si");
    }
}
?> 