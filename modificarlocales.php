<?php

require "funciones.php";
$textoSalida = "Local modificado con éxito";

if(isset($_POST['eliminar'])){
    $bd = conexion();
    $nombre = $_POST['eliminar'];
    $bd = $bd->query("DELETE FROM locales WHERE local_nombre = '$nombre'");
} else if (isset($_POST['modificar'])){
    
    $nombre = trim($_POST['nombrelocal']);
    $ubicacion = trim($_POST['ubicacionlocal']);

    $rubro = trim($_POST['rubrolocal']);
    $nombreviejo = trim($_POST['modificar']);

    $bd = conexion();

    if(validarNombre($nombre, $bd, $nombreviejo)){
        $bd = conexion();
        $dueno = duenolocal($_POST['duenolocal'], $bd);
        $bd = conexion();
        if($dueno != ''){
            $bd = $bd->query("UPDATE locales SET local_nombre = '$nombre', local_ubicacion = '$ubicacion', local_rubro = '$rubro', usuario_id = '$dueno' WHERE local_nombre = '$nombreviejo'");
        }
    } 

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


function validarNombre($nombre, $bd, $nombreviejo){
    if(!($nombreviejo == $nombre)){
        $bd = $bd->query("SELECT * FROM locales WHERE local_nombre = '$nombre'");
    
        if($bd->rowCount() == 0){
            return True;
        }
        global $textoSalida;
        $textoSalida = "El local ya fue creado";
    } else {
        return True;
    }
    return False;
}

function rubroviejo($rubroviejo, $rubro){
    return $rubroviejo == $rubro ? "selected" : "";
    }

function mostrarLocales(){
    $bd = conexion();

    $bd = $bd->query("SELECT * FROM locales");

    if($bd->rowCount() > 0){
        $bd = $bd->fetchAll(PDO::FETCH_ASSOC);
        $contador = 0;

        foreach($bd as $registro){
            $bdaux = conexion();
            $contador++;
            echo <<<HTML
            <div class="accordion-item">
                <div class="md-5 row row-cols-3  py-2">
                <div class="col-md-8">
                <h4 class="accordion-header d-flex align-items-center">
            HTML;

            echo '<p class="px-3 py-2 m-0">'.$registro["local_nombre"].'</p></h4></div>';
            
            echo <<<HTML

            <div class="col-md-2 d-flex justify-content-md-end align-items-center">
                <form method="post" class="m-0">
            HTML;
                   echo '<button type="submit" name="eliminar" class="btn btn-danger" value='.$registro['local_nombre'].'>Eliminar local</button>';
            echo <<<HTML
                </form>
            </div>
            <div class="col-md-2 d-flex justify-content-start align-items-center">
            HTML;
            

            echo '<button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$contador.'" aria-expanded="true" aria-controls="collapse'.$contador.'">Modificar local</button>';
                
            echo <<<HTML
            </div>
                </div>
                </h2>
                <hr class="m-0">
            HTML;
            echo '<div id="collapse'.$contador.'" class="accordion-collapse collapse" data-bs-parent="#accordionExample">';
            echo <<<HTML
                <div class="accordion-body">   
                <form method="post">
                    <div class="form-outline mb-4">
            HTML;
            ?>
            <input name="nombrelocal" value='<?php echo $registro["local_nombre"]; ?>' type="text" id="nombrelocal" class="form-control form-control-lg border-dark" minlength="1" maxlength="100" required/>
            <?php
            echo <<<HTML
                       <label class="form-label" for="nombrelocal">Nombre de local</label>
                       </div>

                       <div class="form-outline mb-4">
            HTML;
            ?>
            <input name="ubicacionlocal" value='<?php echo $registro["local_ubicacion"]?>' type="text" id="ubicacionlocal" class="form-control form-control-lg border-dark" minlength="1" maxlength="50" required/>
            <?php
            echo <<<HTML
                <label class="form-label" for="ubicacionlocal">Ubicación del local</label>
                    </div>

                    <div class="form-outline mb-4">
                        <select name="rubrolocal" id="mailinicio" class="form-control form-control-lg border-dark" required>
                HTML;
                        echo '<option '.rubroviejo($registro["local_rubro"],"indumentaria").' value="indumentaria">Indumentaria</option>';
                        echo '<option '.rubroviejo($registro["local_rubro"],"perfumeria").' value="perfumeria">Perfumería</option>';
                        echo '<option '.rubroviejo($registro["local_rubro"],"comida").' value="comida">Comida</option>';
                        echo '<option '.rubroviejo($registro["local_rubro"],"tecnologia").' value="tecnologia">Tecnología</option>';
                        echo '<option '.rubroviejo($registro["local_rubro"],"optica").' value="optica">Óptica</option>';
                        echo '<option '.rubroviejo($registro["local_rubro"],"servicios").' value="servicios">Servicios</option>';

                echo <<<HTML
                        </select>
                        <label class="form-label" for="rubrolocal">Rubro del local</label>
                    </div>
            
                    <div class="form-outline mb-4">
            HTML;
         
            $bdaux = $bdaux->query("SELECT usuario_mail FROM usuarios WHERE usuario_id = {$registro['usuario_id']}");
            $bdaux = $bdaux->fetch(PDO::FETCH_ASSOC);
            

            echo    '<input name="duenolocal" value='.$bdaux['usuario_mail'].' type="text" id="duenolocal" class="form-control form-control-lg border-dark" pattern="[a-zA-Z0-9._]+@[a-zA-Z0-9._]+.[a-zA-Z]" minlength="1" maxlength="100" required/>';
            echo <<<HTML
                    <label class="form-label" for="mailinicio">Email del dueño</label>
                    </div>
                <!-- ACA -->
            HTML;
            ?>
            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" value='<?php $registro["local_nombre"]?>' name="modificar" type="submit">Confirmar cambios</button>
            <?php
            echo <<<HTML
            </form>
                        </div>
                        </div>
                    </div>
        HTML;
        }
    }
}
?>