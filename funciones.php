
<?php

function conexion(){
    $bd = new PDO("mysql:host=localhost;dbname=shopping", "root","");
    return $bd;
}

?>