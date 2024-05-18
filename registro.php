
<?php include_once("crear_cuenta.php")?>

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
    include_once "navbarfooter.php";
        navbar();
    ?>

    <!--login-->
  
    <section>
        <div class="container-fluid">
            <div class="row fondoformu">
                <div class="col-md-6 text-light">

                    <div class="px-3 ms-xl-4 mt-5 pt-5">
                    
                    <span class="h1 fw-bold mb-0"><img src=source/logoutn.png class="logo" alt="UTNlogo" width="30px">Shopping UTN</span>
                    </div>

                    <div class="text-black d-flex align-items-center justify-content-center px-5 mt-md-5 pt-5 pt-xl-0 mt-xl-n5">
                        
                        <form class="formu my-3" method="post">
                            <h3 class="mb-3 pb-3">Registrarse</h3>
                            <div class="form-outline mb-4">
                                <input name="mail" placeholder="ej: lucaolivieri3@gmail.com" type="email" id="mailinicio" class="form-control form-control-lg border-dark" pattern="[a-zA-Z0-9._]+@[a-zA-Z0-9._]+.[a-zA-Z]" minlength="1" maxlength="100" required/>
                                <label class="form-label" for="mailinicio">Dirección de Email</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                            <input name="psw" type="password" id="pswinicio" pattern="[a-zA-Z0-9]{3,8}" class="form-control form-control-lg border-dark" minlength="3" maxlength="8" required />
                                <label class="form-label" for="pswinicio">Contraseña</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input name="pswc" pattern="[a-zA-Z0-9]{3,8}" minlength="3" maxlength="8" type="password" id="pswcinicio" class="form-control form-control-lg border-dark" required />
                                <label class="form-label" for="pswcinicio">Confirmar contraseña</label>
                            </div>

                            <div class="mb-3">
                            <select class="form-control form-control-lg border-dark" name="tipo" id="tipo" aria-label="Default select example" required>
                                <option value="cliente">Cliente</option>
                                <option value="dueno">Dueño de Local</option>
                            </select>
                            <label class="form-check-label" for="tipo">Tipo de usuario </label>
                            </div>

                            <div class="mb-3" >
                                <input name="terminos" value="si" type="checkbox" id="terminosycondiciones" class="form-check-input" required>
                                <label class="form-check-label" for="terminosycondiciones" > Acepto los términos y condiciones </label>
                            </div>

                            <div class="pt-1 mb-4">
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" type="submit">Ingresar</button>
                            </div>
                            <p>Tienes cuenta? <a href="login.php" class="text-dark">Logueate aquí</a></p>
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
    <!-- Scripts  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    

</body>

</html>