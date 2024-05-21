<?php

require "funciones.php";

$textoSalida = "Novedad modificada con éxito";

if(isset($_POST['eliminar'])){
    $bd = conexion();
    $codigo = $_POST['eliminar'];
    $bd = $bd->query("DELETE FROM novedades WHERE novedad_texto = '$codigo'");
} else if (isset($_POST['modificar'])){
    
    $textoviejo= $_POST['modificar'];
    $textonovedad = $_POST["textonovedad"];
    $fechain = $_POST['fechain'];
    $fechafin = $_POST['fechafin'];
    $categoria = $_POST['catcliente'];

    $bd = conexion();

    if(validartextonovedad($textonovedad, $bd,$textoviejo)){
        if(validarfechain($fechain)){
            if(validarfechafin($fechafin,$fechain)){
                $bd = conexion();
                $bd = $bd->query("UPDATE novedades SET novedad_texto = '$textonovedad', novedad_fechain = '$fechain', novedad_fechafin = '$fechafin', novedad_categoria = '$categoria' WHERE novedad_texto = '$textoviejo'");
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

function validartextonovedad($textonovedad, $bd, $textoviejo){
    if(!($textoviejo == $textonovedad)){
        $bd = $bd->query("SELECT * FROM novedades WHERE novedad_texto = '$textonovedad'");
        if($bd->rowCount() == 0){
        return True;
        }
        global $textoSalida;
        $textoSalida = "El texto de la novedad coincide con una ya existente";
        return False;
    }
}

function clienteant($clienteant, $cliente){
    return $clienteant == $cliente ? "selected" : "";
    }

function mostrarNovedades(){
    $bd = conexion();

    $bd = $bd->query("SELECT * FROM novedades");

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

            echo '<p class="px-3 py-2 m-0">'.$registro["novedad_texto"].'</p></h4></div>';
            
            echo <<<HTML

            <div class="col-md-2 d-flex justify-content-md-end align-items-center">
                <form method="post" class="m-0">
            HTML;
                   echo '<button type="submit" name="eliminar" class="btn btn-danger" value='.$registro['novedad_cod'].'>Eliminar local</button>';
            echo <<<HTML
                </form>
            </div>
            <div class="col-md-2 d-flex justify-content-start align-items-center">
            HTML;
            

            echo '<button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$contador.'" aria-expanded="true" aria-controls="collapse'.$contador.'">Modificar Novedad</button>';
                
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
            <input name="textonovedad" value='<?php echo $registro["novedad_texto"] ?>' type="text" id="textonovedad" class="form-control form-control-lg border-dark" minlength="1" maxlength="100" required/>
            <?php
            echo <<<HTML
                       <label class="form-label" for="textonovedad">Texto novedad</label>
                       </div>

                       <div class="form-outline mb-4">
            HTML;
            echo        '<input name="fechain" value='.$registro["novedad_fechain"].' type="date" id="fechain" class="form-control form-control-lg border-dark" required/>';
            echo <<<HTML
                <label class="form-label" for="fechain">Fecha de inicio</label>
                    </div>
                HTML;
            echo        '<input name="fechafin" value='.$registro["novedad_fechafin"].' type="date" id="fechafin" class="form-control form-control-lg border-dark" required/>';
            echo <<<HTML
                <label class="form-label" for="fechafin">Fecha de finalización</label>
                    </div>
                    
                    <div class="form-outline mb-4">
                        <select name="catcliente" id="catcliente" class="form-control form-control-lg border-dark" required>
                HTML;
                        echo '<option '.clienteant($registro["novedad_categoria"],"inicial").' value="inicial">Inicial</option>';
                        echo '<option '.clienteant($registro["novedad_categoria"],"medium").' value="medium">Medium</option>';
                        echo '<option '.clienteant($registro["novedad_categoria"],"premium").' value="premium">Premium</option>';

                echo <<<HTML
                        </select>
                        <label class="form-label" for="catcliente">Categoría de cliente</label>
                    </div>
            
                    <div class="form-outline mb-4">
            HTML;
            ?>
            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" value='<?php $registro["novedad_texto"]?>' name="modificar" type="submit">Confirmar cambios</button>
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