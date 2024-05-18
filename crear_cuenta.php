<?php 

require "funciones.php";

$textoError = "Error";
     
    if(isset($_POST['mail'])){

        $mail = strtolower(antiInyeccion($_POST['mail']));
        $psw = antiInyeccion($_POST['psw']);
        $pswc = antiInyeccion($_POST['pswc']);
        $tipo = antiInyeccion($_POST['tipo']);
        $terminos = antiInyeccion($_POST['terminos']);
        $bd = conexion();

        if(validarMail($mail, $bd) && validarContraseña($psw, $pswc) && validarTipo($tipo) && validarTerminos($terminos)){
            
            if($tipo == "dueno"){
                
                $categoria = NULL;
            } else {
                $categoria = "inicial";
            }

            $psw = password_hash($psw, PASSWORD_BCRYPT);

            $bd->query("INSERT INTO usuarios (usuario_mail, usuario_psw, usuario_tipo, usuario_categoria) VALUES ('$mail', '$psw', '$tipo', '$categoria')");
            session_name("usuario");
            session_start();
            $_SESSION['mail'] = $mail;
            $_SESSION['psw'] = $psw;
            echo "<script> window.location.href='index.php'</script>";
        }

    }



function validarMail($mail, $bd){
        global $textoError;
        $patronMail = "/^[a-zA-Z0-9._]+@[a-zA-Z0-9._]+\.[a-zA-Z]+$/";
        if($mail != '' && preg_match($patronMail,$mail) && strlen($mail) <= 100){
            $bd = $bd->query("SELECT * FROM usuarios WHERE usuario_mail = '$mail'");
            if($bd->rowCount() == 0){
                return true; 
            } else {
               $textoError = "El mail ya está en uso";
            } 
        } else {
            $textoError = "Formato no aceptado";
            
        }

            
        return false;
    }





function validarContraseña($psw, $pswc){
    $patronContraseña = "/^[a-zA-z0-9#]{3,8}+$/";
    global $textoError;
    
    if($psw != '' && $pswc != ''){
           if(preg_match($patronContraseña, $psw)){
              if($psw === $pswc){
                return true;
              }
              else {
                    $textoError = "Las contraseñas no coinciden";
              }
           } else {
              $textoError = "Formato no aceptado";
           }
    }

    return false;
  }


function validarTipo($tipo){
    if($tipo === "dueno" || $tipo === "cliente"){
       
        return true;
    }
    global $textoError;
    $textoError = "Tipo de usuario inválido";
    return false;
}


function validarTerminos($terminos){

    if($terminos === "si"){
        return true;
    }
    global $textoError;
    $textoError = "Acepte los términos y condiciones";

    return false;
}    





?>

