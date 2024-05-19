<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping UTN</title>
    <link rel="icon" href="source/logoutn.png" type="image/png">
    <link rel="stylesheet" href="estiloindex.css">
    <link rel="stylesheet" href="estilogeneral.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/735bc52976.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Navbar  -->
    <?php
        session_name("usuario");
        session_start();
        include_once "navbarfooter.php";
        navbar();
        
    ?>
     
    <!-- Carrusel  -->

    <div id="carruselindex" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="cr1 critem"></div>
            </div>
            <div class="carousel-item">
                <div class="cr2 critem"></div>
            </div>
            <div class="carousel-item">
                <div class="cr3 critem"></div>
            </div>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#carruselindex" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carruselindex" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Info propia  -->
     
    <section class="container my-md-5 shopping">
        
        <h2>Shopping UTN, tu lugar ideal</h2>
        <div class="row">
        <div class="col">
            <p>¡Bienvenido a Shopping UTN, tu destino de compras favorito! En nuestro emocionante universo de moda, tecnología y entretenimiento, encontrarás todo lo que necesitas y mucho más. Desde las últimas tendencias en moda hasta los dispositivos más innovadores, nuestra amplia selección de productos está diseñada para satisfacer todas tus necesidades y deseos.</p>
        </div>
        <div class="col"><p>Pero en Shopping UTN, no somos solo un destino de compras; somos una comunidad vibrante que celebra la diversidad y la creatividad. Nuestra misión es crear experiencias únicas para nuestros clientes, donde puedan descubrir nuevas inspiraciones, conectarse con otros amantes de las compras y sentirse parte de algo especial.<p>
        </div>
        </div>
    </section>

    <!-- Cards -->

    <section class="cartas">
        <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-3">
            <div class="col">
                <div class="card h-100 border-dark-subtle">
                <img src="source/promociones.png" class="card-img-top" alt="promociones">
                <hr>
                <div class="card-body pt-0">
                    <h5 class="card-title">Promociones</h5>
                    <p class="card-text">Accedé las mejores promociones de todo Rosario con el poder de un solo click!</p>
                    <a href="#" class="btn btn-outline-primary w-100" >Click aquí</a>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-dark-subtle">
                <img src="source/novedades.png" class="card-img-top" alt="novedades">
                <hr>
                <div class="card-body pt-0">
                    <h5 class="card-title">Novedades</h5>
                    <p class="card-text">Estate al tanto de los nuevos eventos que suceden sobre tus locales favoritos.</p>
                    <a href="#" class="btn btn-outline-primary w-100">Click aquí</a>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-dark-subtle">
                <img src="source/dueño.png" class="card-img-top" alt="creá tu local">
                <hr>
                <div class="card-body pt-0">
                    <h5 class="card-title">¿Querés instalar tu marca?</h5>
                    <p class="card-text">Convertite en el dueño de un local y unite a nuestro shopping!</p>
                    <a href="#" class="btn btn-outline-primary w-100">Click aquí</a>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>



    <!-- Maps  -->

    <iframe width=100% style="border: 1px solid black" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3347.8704282892736!2d-60.646306823595474!3d-32.95443017228297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b7ab11d0eb49c3%3A0x11f1d3d54f950dd0!2sUniversidad%20Tecnol%C3%B3gica%20Nacional%20%7C%20Facultad%20Regional%20Rosario!5e0!3m2!1ses!2sar!4v1715468998291!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <!-- Footer  -->

    <?php
        footer();

    ?>
    

    <!-- Scripts  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

