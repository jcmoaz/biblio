<?php
/**
 * Created by PhpStorm.
 * User: Juan Carlos Molina Azorín
 * Date: 02/06/2016
 * Time: 1:37
 */
//En funcion del valor de central mostraré los distintos mantenimientos / secciones en la parte central.
if (isset($_REQUEST["central"])){
    switch ($_REQUEST["central"]) {
        case "mt":
            // "mantenimiento trabajadores";
            include("manttrabaja.php");
            break;
        case "ma":
            // "mantenimiento articulos";
            include("mantarticulo.php");
            break;

        case "mm":
            // "mantenimiento materias";
            include("mantmaterias.php");
            break;

        case "ml":
            // "mantenimiento libros";
            include("mantlibrosejemplares.php");
            break;
        case "mc":
            // "mantenimiento categorias";
            include("mantcategorias.php");
            break;
        case "mp":
            // "mantenimiento pedidos";
            include("mantpedidos.php");
            break;
        case "mpr":
            // "mantenimiento prestamos";
            include("mantprestamos.php");
            break;
        case "a":
            // "mostrar articulos";
            include("centralarticulos.php");
            break;
        case "oa":
            // "modifica articulos";
            include("modifica_articulos.php");
            break;

        case "om":
            // "modifica materias";
            include("modifica_materias.php");
            break;
        case "oc":
            // "modifica categorias";
            include("modifica_categorias.php");
            break;
        case "ot":
            // "modifica trabajadores";
            include("modifica_trabajadores.php");
            break;
        case "ip":
            // "mis pedidos";
            include("mispedidos.php");
            break;
        case "gc":
            // "gestionar carrito";
            include("gestcarrito.php");
            break;
        case "vc":
            // "validar compra";
            include("validarcompra.php");
            break;
        case "qui":
            // "quienes somos";
            include("quienes.php");
            break;
        case "con":
            // "contacto";
            include("contacto.php");
            break;
        case "avi":
            // "aviso legal";
            include("avisolegal.php");
            break;
        case "pol":
            // "aviso legal";
            include("politicaprivadidad.php");
            break;
        case "md":
            // "modifica datos personales";
            include("modifica_datos.php");
            break;
    }//switch	


}
else{
    // "mostrar artículos";
   // include("centralarticulos.php");
    include("centralarticulos.php");
}

?>