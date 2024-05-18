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
        echo "<script> window.location.href='index.php'</script>";
        
    } 
endif;


function validarUsuario($mail, $psw, $bd){
    echo $mail;
    $bd = $bd->query("SELECT * FROM usuarios WHERE usuario_mail = 'ignaciolurati@gmail.com'");

    if($bd->rowCount() > 0){
        $datos = $bd->fetch(PDO::FETCH_ASSOC);
        if(password_verify($psw, $datos["usuario_psw"])){
            return true;
        }
    }

    return false;   
}


?>