
<?php 
        session_name("usuario");
        session_start();
        if(isset($_SESSION['mail'])){
           if(!($_SESSION['mail'] == "admin@shopping.com")){
            echo "<script> window.location.href='index.php'</script>";
           }
        }

        include_once "navbarfooter.php";
        navbar();
    ?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="icon" href="source/logoutn.png" type="image/png">
    <link rel="stylesheet" href="estilogeneral.css">
    <link rel="stylesheet" href="estiloadmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/735bc52976.js" crossorigin="anonymous"></script>
</head>
<body>

   
    <section class="container" style="margin-top: 5%; text-align:center; margin-bottom: 5%"> 
        <h1>Bienvenido administrador! ¿Qué desea hacer hoy?</h1>
           <div class="row row-cols-1 row-cols-md-3">
              <a class="col pd-5" href="#" style="text-decoration: none;"><div id="foto1" class="foto-general"><p class="texto-foto"></p></div></a>
              <a class="col" href="#" style="text-decoration: none;"><div id="foto2" class="foto-general"><p class="texto-foto"></p></div></a>
              <a class="col" href="#" style="text-decoration: none;"><div id="foto3" class="foto-general"><p class="texto-foto"></p></div></a>
           </div>

           <div class="row row-cols-1 row-cols-md-3">
              <a class="col pd-5" href="#" style="text-decoration: none;"><div id="foto1" class="foto-general"><p class="texto-foto"></p></div></a>
              <a class="col" href="#" style="text-decoration: none;"><div id="foto2" class="foto-general"><p class="texto-foto"></p></div></a>
              <a class="col" href="#" style="text-decoration: none;"><div id="foto3" class="foto-general"><p class="texto-foto"></p></div></a>
           </div>

           <div class="row row-cols-1 row-cols-md-3">
              <a class="col pd-5" href="#" style="text-decoration: none;"><div id="foto1" class="foto-general"><p class="texto-foto"></p></div></a>
              <a class="col" href="#" style="text-decoration: none;"><div id="foto2" class="foto-general"><p class="texto-foto"></p></div></a>
              <a class="col" href="#" style="text-decoration: none;"><div id="foto3" class="foto-general"><p class="texto-foto"></p></div></a>
           </div>
         
        
    </section>
    <?php 
       footer();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>