<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping UTN</title>
    <link rel="icon" href="source/logoutn.png" type="image/png">
    <link rel="stylesheet" href="estiloadmin.css">
    <link rel="stylesheet" href="estilogeneral.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/735bc52976.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: rgb(241, 241, 241)">
    <?php 
    
    session_name("usuario");
    session_start();
    if(isset($_SESSION['mail'])){
       if(!($_SESSION['mail'] == "admin@shopping.com")){
        echo "<script> window.location.href='index.php'</script>";
       }
    } else {
        echo "<script> window.location.href='index.php'</script>";
       }

    include_once "navbarfooter.php";
    include_once "creacionnovedad.php";
    

    navbar();?>
    
    <section class="container" style="margin-top: 100px">
        <h2>Novedades</h2>
        <form method="post">
            <div class="form-outline mb-4">
                <input name="textonovedad" placeholder="ej: Martes cerrado" type="text" id="textonovedad" class="form-control form-control-lg border-dark" minlength="1" maxlength="200" required/>
                <label class="form-label" for="textonovedad">Información de la novedad</label>
            </div>

            <div class="form-outline mb-4">
                <input name="fechain" type="date" id="fechain" class="form-control form-control-lg border-dark" required/>
                <label class="form-label" for="fechain">Fecha de Inicio</label>
            </div>

            <div class="form-outline mb-4">
                <input name="fechafin" type="date" id="fechafin" class="form-control form-control-lg border-dark" required/>
                <label class="form-label" for="fechafin">Fecha de Finalización</label>
            </div>

            <div class="form-outline mb-4">
                <select name="catcliente" id="catcliente" class="form-control form-control-lg border-dark" required>
                    <option value="inicial">Inicial</option>
                    <option value="medium">Medium</option>
                    <option value="premium">Premium</option>                    
                </select>
                <label class="form-label" for="catcliente">Categoría de cliente</label>
            </div>

            <?php 
                 if(isset($_POST['textonovedad']) && $textoSalida != "Novedad creada con éxito"){
                    echo '<p class="text-danger">'.$textoSalida.'</p>'; }
                 else if (isset($_POST['textonovedad'])){
                    echo '<p class="text-primary">'.$textoSalida.'</p>';
                 }
            ?>
            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" type="submit">Crear novedad</button>
        </form>
   
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    
</body>
    
</html>