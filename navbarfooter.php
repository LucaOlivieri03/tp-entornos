<?php 

function navbar(){
    if(!isset($_SESSION['mail'])){
      $boton = '<a class="nav-link text-light ms-auto mx-5 py-2" href="login.php">Iniciar sesión</a>' ;
    }else{
      $boton = '<a class="nav-link text-light ms-auto mx-5 py-2" href="login.php">Cerrar sesión</a>' ;
    }
     echo <<<"HTML"
            <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top py-0">
            <div class="container-fluid contenedornavbar py-2">
              <a class="navbar-brand mx-lg-4" href="https://www.frro.utn.edu.ar/" target="_blank"><img width="30px" src="source/logoutn.png"></a>
              <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" href="#">Novedades</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" href="#">Promociones</a>
                  </li>
                </ul> 
          HTML;
      echo $boton;
      echo <<<HTML
                    </div>
                  </div>
                </nav>
                </header>
              HTML;

};

function footer(){
  echo <<<"HTML"
  <footer class="footer">
  <h4> Seguinos en nuestras redes! </h4>
  <div class="container-fluid footersuperior">
      <i class="fa-brands fa-facebook itemfooter mx-4"></i>
      <a href="https://www.frro.utn.edu.ar/" target="_blank"><img src="source/logoutn.png" alt="logoutn" width="30px"><a>
      <i class="fa-brands fa-instagram itemfooter mx-4"></i>

  </div>
  
  <div class="footerinf mt-4">
    <label class="mt-3"><a class="mail" href="mailto:admin@shopping.com.ar" target="_blank">admin@shopping.com.ar</a></label>
    <label><p>Copyright © ShoppingUtn™</p></label>
  </div>
  </footer>  
  HTML;
}

?>