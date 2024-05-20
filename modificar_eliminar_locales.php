
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
    }

    include_once "navbarfooter.php";
    include_once "modificarlocales.php";
    

    navbar();?>
   
   <section class="container" style="margin-top: 100px">
   <div class="accordion" id="accordionExample">
    <?php 
     mostrarLocales();

     if(isset($_POST["modificar"])){
        if($textoSalida == "Local modificado con éxito"){
            echo '<div class="alert alert-primary mt-3" role="alert">'.$textoSalida.'</div>';
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">'.$textoSalida.'</div>';
        }
     }
    ?>
    
  </div>
   </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    
</body>
    
</html>