<div id="administra">
    <?php
    /**
     * Created by PhpStorm.
     * User: Juan Carlos Molina Azorín
     * Date: 04/06/2016
     * Time: 9:55
     */
    if(isset($_SESSION["autentificado"])){
        include("conectarbd.php");

        //$sql="select * from usuarios where email='".$_SESSION["autentificado"]."' and tipo ='S'";
        $sql="select * from usuarios where email='".$_SESSION["autentificado"]."'";
        $res=mysqli_query($con,$sql);
        /*$numfilassuper=mysqli_num_rows($res);
        $sql="select * from usuarios where email='".$_SESSION["autentificado"]."' and tipo ='E'";
        $res=mysqli_query($con,$sql);
        $numfilasemple=mysqli_num_rows($res);*/

        $numfilas=mysqli_num_rows($res);
        //echo $numfilas;
        if($numfilas==1){
            //Usuario existente. Obtengo su nombre y defino una sesion.
            $fila=mysqli_fetch_array($res);
            while($fila){
                $tipo= $fila["tipo"];
                $fila=mysqli_fetch_array($res);
            }

            include("desconectarbd.php");

            if($tipo=='S'){
                //Usuario existente y ademas es superadministrador

                echo'<br>Administrador<ul class="menu2">
					<li><a href="index.php?central=md">Mis datos</a></li>
					<li><a href="index.php?central=mt">Mantenimiento Trabajadores</a></li>			
					<li><a href="index.php?central=ma">Mantenimiento Artículos</a></li>
					<li><a href="index.php?central=ml">Mantenimiento Libros</a></li>
					<li><a href="index.php?central=mc">Mantenimiento Categorías</a></li>
					<li><a href="index.php?central=mm">Mantenimiento Materias</a></li>
					<li><a href="index.php?central=mp">Mantenimiento Pedidos</a></li>
					<li><a href="index.php?central=mpr">Mantenimiento Prestamos</a></li>
					</ul>	';
            }
            elseif($tipo=='E'){
                //Usuario existente y ademas es empleado
                echo'Empleado<ul class="menu2">
					<li><a href="index.php?central=md">Mis datos</a><</li>
					<li><a href="index.php?central=ma">Mantenimiento Artículos</a></li>
					<li><a href="index.php?central=ml">Mantenimiento Libros</a></li>
					<li><a href="index.php?central=mc">Mantenimiento Categorías</a></li>
					<li><a href="index.php?central=mm">Mantenimiento Materias</a></li>
					<li><a href="index.php?central=mp">Mantenimiento Pedidos</a></li>
					<li><a href="index.php?central=mpr">Mantenimiento Prestamos</a></li>
					</ul>	';
            }
            else {
                //Usuario existente y ademas es cliente
                echo'<br>Cliente<ul class="menu2">		
					<li><a href="index.php?central=md">Mis datos</a></li>
					<li><a href="index.php?central=mp">Mis Pedidos</a></li>
					</ul>	';
            }

        }

    }


    //}
    ?>
</div>	<!-- administra -->