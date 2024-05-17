<?php 

if(isset($_POST['mail'])):

    include_once ("funciones.php");
   
    $mail = $_POST['mail'];
    $psw = $_POST['psw'];
    $bd = conexion();

    if(validarUsuario($mail, $psw, $bd)){
        session_name("usuario");
        session_start();
        $_SESSION['mail'] = $mail;
        $_SESSION['psw'] = $psw;
        header("index.php");

    } else {
        
    }

endif;



function validarUsuario($mail, $psw, $bd){
    $bd = $bd->query("SELECT * FROM usuarios WHERE usuario_mail = '$mail'");

    if($bd->num_rows > 0){
        $datos = $bd->fetch_assoc();
        if($datos["usuario_psw"] == $psw){
            return true;
        }
    }

    return false;   
}


?>