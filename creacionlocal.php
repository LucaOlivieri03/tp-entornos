<?php 

$textoSalida = "Local creado con éxito";

if(isset($_POST['nombrelocal'])){
    require "funciones.php";
    $nombre = trim($_POST['nombrelocal']);
    $ubicacion = trim($_POST['ubicacionlocal']);
    $rubro = trim($_POST['rubrolocal']);
    $dueno = trim($_POST['duenolocal']);

    $bd = conexion();

    if(validarNombre($nombre, $bd)){
        $bd = conexion();
        $dueno = duenolocal($dueno, $bd);
        if($dueno != ''){
            $bd = conexion();
            $bd->query("INSERT INTO locales (local_nombre, local_ubicacion, local_rubro, usuario_id) VALUES ('$nombre', '$ubicacion', '$rubro', '$dueno')");


        }
    }
}


function validarNombre($nombre, $bd){
    $bd = $bd->query("SELECT * FROM locales WHERE local_nombre = '$nombre'");
    if($bd->rowCount() == 0){
       return True;
    }
    global $textoSalida;
    $textoSalida = "El local ya fue creado";
    return False;
}

function duenolocal($dueno, $bd){
    $bd = $bd->query("SELECT * FROM usuarios WHERE usuario_mail = '$dueno'");
    if($bd->rowCount() > 0){
       $bd = $bd->fetch(PDO::FETCH_ASSOC);
       if($bd["usuario_tipo"]=="dueno"){
        return $bd["usuario_id"];
       }
    }

    global $textoSalida;
    $textoSalida = "El usuario no existe o no es de tipo dueño";
    return '';
}


?>