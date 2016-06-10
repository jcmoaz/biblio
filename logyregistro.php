<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 02/06/2016
 * Time: 0:31
 */
		if(isset($_REQUEST["registro"]) && $_REQUEST["registro"]=="1" ) {
            ?>
            <h3>Registro</h3>
            <!--<form id="regalta" method="post" action="alta_usuario.php"> -->
            <!--<form id="regalta" method="post" action="<?php //$PHP_SELF ?>"> -->
            <form id="regalta" method="post" action="index.php">
                <label for="emailalta" >Email*</label><input type="text" name="emailalta" maxlength="20" id="emailalta">
                <label for="passwordalta" >Contraseña*</label><input  type="password" name="passwordalta" maxlength="15" id="passwordalta">
                <label for="nombrealta">Nombre*</label><input type="text" name="nombrealta" maxlength="25" id="nombrealta">
                <label for="apellido1alta">Primer Apellido</label><input type="text" name="apellido1alta"  maxlength="15" id="apellido1alta">
                <label for="apellido2alta">Segundo Apellido</label><input type="text" name="apellido2alta" maxlength="15" id="apellido2alta">
                <label for="direcalta">Dirección</label><input type="text" name="direcalta"  maxlength="25" id="direcalta">
                <label for="cpostalalta">Cod.Postal</label><br><input size="5" type="text" name="cpostalalta" maxlength="5" id="cpostalalta"><br>
                <label for="localidadalta">Localidad</label><input type="text" name="localidadalta" maxlength="15" id="localidadalta" >
                <label for="provinciaalta" >Provincia</label><input type="text" name="provinciaalta" maxlength="15" id="provinciaalta" >
                <label for="telefonoalta" >Teléfono</label><input type="text" name="telefonoalta" maxlength="12" id="telefonoalta" ><br>
                <label for="dnialta">DNI</label><br><input type="text" name="dnialta" maxlength="9" id="dnialta" >
                <input type="text" name="envio" value="1" class="oculto" id="envio" title="envio">
                <input type="submit" value="Nuevo usuario"><br>
                *Obligatorios
            </form>

            <?php
            if(isset($_REQUEST["error"]) && $_REQUEST["error"]=="1" ) echo "Error. Faltan datos";
        }
        else {
            ?>
            <h4>Login</h4>
            <form id="loguear" method="post" action="control.php">
                <label for="emaill" >Email</label><input type="text" name="emaill" id="emaill"/><br>
                <label for="passl" >Contraseña</label><input type="password" name="passl" id="passl"/>
                <input class="boton" type="submit" value="Entrar">
            </form>

            <!--<h4>Registrarse</h4>-->
            <!--<form id="registrar" method="post" action="<?php //$PHP_SELF ?>">	-->
            <form id="registrar" method="post" action="index.php">
                <input type="text" name="registro" value="1" class="oculto" id="registro" title="registro">
                <input class="boton" type="submit" value="Registrarse">
            </form>
            <?php
        }
	?>

<?php
if(isset($_REQUEST["dadodealta"]) && ($_REQUEST["dadodealta"]=="yes")) {
    echo "<h5>Registro realizado con éxito. ¡Por favor logueate!</h5>";
}

if(isset($_REQUEST["errorlogueo"]) && ($_REQUEST["errorlogueo"]=="si")) {
    echo "<h5>Error. Email o contraseña incorrectos!</h5>";
}
?>

<?php
if (isset($_REQUEST["envio"]) && $_REQUEST["envio"]=="1"){

    if(isset($_REQUEST["emailalta"]) && isset($_REQUEST["passwordalta"]) && isset($_REQUEST["nombrealta"]) /*&& isset($_REQUEST["apellido1alta"]) && isset($_REQUEST["apellido2alta"]) && isset($_REQUEST["dnialta"]) && isset($_REQUEST["direcalta"]) && isset($_REQUEST["cpostalalta"]) && isset($_REQUEST["localidadalta"]) &&  isset($_REQUEST["provinciaalta"]) && isset($_REQUEST["telefonoalta"])*/)
    {
        //echo "pasado con éxito. Voy a insertar en la base de datos.";
        if(!empty($_REQUEST["emailalta"]) && !empty($_REQUEST["passwordalta"]) && !empty($_REQUEST["nombrealta"]) /*&& !empty($_REQUEST["apellido1alta"]) && !empty($_REQUEST["apellido2alta"]) && !empty($_REQUEST["dnialta"]) && !empty($_REQUEST["direcalta"]) && !empty($_REQUEST["cpostalalta"]) && !empty($_REQUEST["localidadalta"]) &&  !empty($_REQUEST["provinciaalta"]) && !empty($_REQUEST["telefonoalta"])*/)
        {
            include("conectarbd.php");

            $emaila=$_REQUEST["emailalta"];
            $passworda=$_REQUEST["passwordalta"];
            $nombrea=$_REQUEST["nombrealta"];

            if (isset($_REQUEST["apellido1alta"]))
                $apellido1a=$_REQUEST["apellido1alta"];
            else $apellido1a= '';
            //$apellido1a=$_REQUEST["apellido1alta"];

            if (isset($_REQUEST["apellido2alta"]))
                $apellido2a=$_REQUEST["apellido2alta"];
            else $apellido2a= '';
            //$apellido2a=$_REQUEST["apellido2alta"];

            if (isset($_REQUEST["direcalta"]))
                $direcciona=$_REQUEST["direcalta"];
            else $direcciona= '';
            //$direcciona=$_REQUEST["direcalta"];

            if (isset($_REQUEST["cpostalalta"]))
                $cpostala=$_REQUEST["cpostalalta"];
            else $cpostala= '';
            //$cpostala=$_REQUEST["cpostalalta"];

            if (isset($_REQUEST["localidadalta"]))
                $localidada=$_REQUEST["localidadalta"];
            else $localidada= '';
            //$localidada=$_REQUEST["localidadalta"];

            if (isset($_REQUEST["provinciaalta"]))
                $provinciaa=$_REQUEST["provinciaalta"];
            else $provinciaa= '';
            //$provinciaa=$_REQUEST["provinciaalta"];

            if (isset($_REQUEST["telefonoalta"]))
                $telefonoa=$_REQUEST["telefonoalta"];
            else $telefonoa= '';
            //$telefonoa=$_REQUEST["telefonoalta"];

            if (isset($_REQUEST["dnialta"]))
                $dnia=$_REQUEST["dnialta"];
            else $dnia= '';
            //$dnia=$_REQUEST["dnialta"];


            /* inserto con el tipo de usuario 'C' (cliente) y activo 'S' */
            $sql="insert into usuarios values ('$emaila','$passworda','$nombrea','$apellido1a','$apellido2a','$direcciona','$cpostala','$localidada','$provinciaa','$telefonoa','$dnia','C','S')";
            $res=mysqli_query($con,$sql);
            include("desconectarbd.php");
            echo "Insertado con éxito. Logueate.";
            header("location:index.php?dadodealta=yes");
        }
        else
        {
            echo "Error.Algún campo está vacío";
            header("location:index.php?registro=1&error=1");
            //header("Location:".$PHP_SELF);
            //header("Location: " . $_SERVER['PHP_SELF']);
            //header("location:index.php?dadodealta=no");
        }

    }
    else
    {
        echo "no he pasado con éxito";
        //	header("Location:".$PHP_SELF);
        //header("location:logyregistro.php");
        //header("location:index.php?dadodealta=no");

    }
}
?>
