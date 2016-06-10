<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 01/06/2016
 * Time: 23:20
 */
	include ("seguridad.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="css/hojaestilo.css" rel="stylesheet" type="text/css" media="all" />
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <title>
        Biblioteca IES Hermanos Amorós Villena. Juan Carlos Molina Azorin.
    </title>
    <script>
        $(function() {
            $( "#datepicker" ).datepicker();
        });


       /* // Traducción al español
        $(function($){
            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);
        });
*/



    </script>
</head>
<body>
<div id="cabecera">
    <img class="logoizq" src="images/logo.jpg" width="150px" height="120px" alt="logo mundodisco" />
    <!--<h1 class="textoder"> MundoDisco  </h1>-->
</div>

<div id="menu">
    <ul class="menu1">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="index.php?central=qui">Quiénes somos</a></li>
        <li><a href="index.php?central=con">Contacto</a></li>
        <li><a href="#">Envío</a></li>
    </ul>
</div>



<div id="principal">

    <div id="lateralizq">
        <?php
            include("lateralizq.php");
        ?>
    </div> <!-- lateralizq -->

    <div id="central">
        <!--Aqui van datos de lo artículos-->
        <?php
            include("central.php"); 
        ?>
    </div> <!-- central -->

    <div id="lateralder">
        <?php
        include("logueo.php");
        ?>
        <?php
        /** include("carrito.php");*/
        ?>
        <?php
         include("administra.php");
        ?>
    </div>		<!-- lateralder -->
</div> <!-- principal -->



<?php
 include("pie.php"); 
?>

</body>
</html>