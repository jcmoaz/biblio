<div id="logueo">
	<?php
		if((isset($_SESSION["autentificado"]))&& (isset($_SESSION["nombreusu"]))){

            ?>
            Bienvenido <?php echo $_SESSION["nombreusu"]; ?>
            <br><br>
            <form action='salir.php'>
                <input align="center" type='submit' value='Salir de la sesión'>
            </form>
            <!--
            <a href='mispedidos.php'>Mis pedidos</a><br>
            <a href='modifica_datos.php'>Mis datos</a><br>
            -->
            <!--<a href='index.php?central=ip'>Mis pedidos</a><br>	-->
            <!--<a href='index.php?central=md'>Mis datos</a><br>-->

            <?php
        }
        else
        {
            //"No estas autentificado<br>";
            include("logyregistro.php");
        }
	?>
</div>	<!-- logueo -->