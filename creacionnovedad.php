<?php 
date_default_timezone_set('America/Argentina/Buenos_Aires');
$hoy  = date("Y-m-d");

$textoSalida = "Novedad creada con éxito";

if(isset($_POST['textonovedad'])){
    require "funciones.php";
    $textonovedad = trim($_POST['textonovedad']);
    $fechain =$_POST['fechain'];
    $fechafin = $_POST['fechafin'];
    $categoria = trim($_POST['catcliente']);
    $bd = conexion();

    if(validartextonovedad($textonovedad, $bd)){
        if(validarfechain($fechain)){
            if(validarfechafin($fechafin,$fechain)){
                $bd = conexion();
                $bd->query("INSERT INTO novedades (novedad_texto, novedad_fechain, novedad_fechafin, novedad_categoria) VALUES ('$textonovedad', '$fechain', '$fechafin', '$categoria')");
        }
    }
}
}


function validarfechain($fecha){
    global $hoy;
    if($fecha >= $hoy){
        return true;
    }
    global $textoSalida;
    $textoSalida = "La fecha de inicio es anterior a la fecha actual";
    return false;
}
function validarfechafin($fecha, $inicio){
    global $hoy;
    if($fecha >= $hoy && $fecha >= $inicio){
        return true;
    }
    global $textoSalida;
    $textoSalida = "La fecha de finalización es anterior a la fecha actual o de inicio";
    return false;
}

function validartextonovedad($textonovedad, $bd){
    $bd = $bd->query("SELECT * FROM novedades WHERE novedad_texto = '$textonovedad'");
    if($bd->rowCount() == 0){
       return True;
    }
    global $textoSalida;
    $textoSalida = "El texto de la novedad coincide con una ya existente";
    return False;
}
?>