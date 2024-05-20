<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
$hoy  = date("Y-m-d");
$fecha= explode('.', $hoy);
echo $hoy;
foreach ($fecha as $fecha){
    echo '  '.$fecha.'  ';
} 

?>

<form action='' method="POST">
    <input name="fechain" type="date" id="fechain"/>
    <label class="form-label" for="fechain">Fecha de Inicio</label>
    <input  type="submit" />
</form>

<?php
    if(isset($_POST['fechain'])){
        echo $_POST['fechain'];
    }

?>