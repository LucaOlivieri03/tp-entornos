
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesión</title>
    <link rel="icon" href="source/logoutn.png" type="image/png">
    <link rel="stylesheet" href="estiloses.css">
    <link rel="stylesheet" href="estilogeneral.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/735bc52976.js" crossorigin="anonymous"></script>
</head>

<body>

<!-- Navbar  -->
<?php
include_once "navbarfooter.php";  /* NO ANDA */
    navbar();
?>

<!--login-->
<section class="vh-100">
    <div class="container-fluid">
        <div class="row bg-secondary">
            <div class="col-sm-6 text-black">

                <div class="px-5 ms-xl-4 py-5">
                <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4""></i>
                <span class="h1 fw-bold mb-0">Shopping UTN</span>
                </div>

                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                <form style="width: 23rem;">

                    <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia sesión</h3>

                    <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="mailinicio" class="form-control form-control-lg" />
                    <label class="form-label" for="mailinicio">Dirección de Email</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="pswinicio" class="form-control form-control-lg" />
                    <label class="form-label" for="pswinicio">Contraseña</label>
                    </div>

                    <div class="pt-1 mb-4">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" type="button">Ingresar</button>
                    </div>

                    <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">¿Olvidaste tu contraseña?</a></p>
                    <p>¿No tienes cuenta? <a href="#!" class="link-info">Registrate aquí</a></p>

                </form>

                </div>

            </div>
                
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <div id="carruselses" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="crs1 critemses"></div>
                            </div>
                            <div class="carousel-item">
                                <div class="crs2 critemses"></div>
                            </div>
                            <div class="carousel-item">
                                <div class="crs3 critemses"></div>
                            </div>
                    </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer  -->
<?php
footer();
?>

</body>

</html>