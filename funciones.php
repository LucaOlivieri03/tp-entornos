
<?php

function conexion(){
    $bd = new PDO("mysql:host=localhost;dbname=shopping", "root","");
    return $bd;
}

function cerrarSesion(){
    $email = $_SESSION['mail'];

    echo "<div class='alert alert-primary container mt-5' role='alert'><p>Usted se encuentra logueado como " .$email."<br>¿Desea cerrar la sesión?</p></div>";
    echo <<<"HTML"

        <div class="container alert-primary mt-1">
            <form method='post' action=''>
                <button class="btn btn-primary" type='submit' name="cs" value="cs">Cerrar sesión</button>
            </form>
        </div>
    </nav>
 </header>

HTML;
}

function antiInyeccion($cadena){
    $pattern = '/(DROP TABLE|SELECT \* FROM|TRUNCATE TABLE|SHOW TABLES|\<|==|\s|\<?php|\?|\/|--|\:|\;|script|\>|\^|\[|\]|DELETE FROM|INSERT INTO|DROP DATABASE|SHOW DATABASE)/i';
    $cadena =  preg_replace($pattern, '', $cadena);
    $cadena = trim($cadena);
    $cadena = stripslashes($cadena);
    return  $cadena;
}
?>

