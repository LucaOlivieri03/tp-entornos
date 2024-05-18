<?php 
     
    if(isset($_POST['mail'])){
        $mail = $_POST['mail'];
        $psw = $_POST['psw'];
        $pswc = $_POST['pswc'];
        $tipo = $_POST['tipo'];
        $terminos = $_POST['terminos'];

        if(validarMail($mail) && validarContraseña($psw, $pswc) && validarTipo($tipo) && validarTerminos($terminos)){
            include_once("funciones.php");
            $bd = conexion();
            if($tipo == "dueño"){
                $categoria = NULL;
            } else {
                $categoria = "inicial";
            }

            $psw = password_hash($psw, PASSWORD_BCRYPT);

            $bd->query("INSERT INTO usuarios (usuario_mail, usuario_psw, usuario_tipo, usuario_categoria) VALUES ('$mail', '$psw', '$tipo', '$categoria')");
        }
        else {
            echo "<br><br><br><br><br><br><br><br>SOS UN PELOTUDO";
        }
    }



function validarMail($mail){
        $patronMail = "/^[a-zA-Z0-9._]+@[a-zA-Z0-9._]+\.[a-zA-Z]+$/";
        if($mail != '' && preg_match($patronMail,$mail)){
            return true; 
    }

 return false;

}

function validarContraseña($psw, $pswc){
    $patronContraseña = "/^[a-zA-z0-9#]{3,8}+$/";
    
    if($psw != '' && $pswc != ''){
           if(preg_match($patronContraseña, $psw)){
              if($psw === $pswc){
                return true;
           }
    }

    return false;
  }
}

function validarTipo($tipo){
    if($tipo === "dueño" || $tipo === "cliente"){
        return true;
    }

    return false;
}


function validarTerminos($terminos){

    if($terminos === "si"){
        return true;
    }


    return false;
}    





?>

