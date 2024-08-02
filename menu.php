<link rel="stylesheet" href="css/menu.css">

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">
    <img src="images/logoblanco.png" alt="">
    </a>
  
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"     data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MENÚ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="navbar-nav mx-lg-auto">
          <a class="nav-item nav-link" href="index.php">Inicio</a>
          <a class="nav-item nav-link" href="nosotros.php">Nosotros</a>
          <li class="nav-item dropdown" onmouseenter="abrirMenuDesplegable()" onmouseleave="cerrarMenuDesplegable()">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Oferta educativa
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="ofertaeducativa.php">Oferta</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="ofertaeducativa.php#maestria">Maestrías</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="ofertaeducativa.php#especialidad">Especialidades</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="ofertaeducativa.php#modeloeducativo">Modelo educativo</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown" onmouseenter="abrirMenuDesplegableDos()" onmouseleave="cerrarMenuDesplegableDos()">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Trámites y servicios
          </a>
          <ul class="dropdown-menu dropdown-menuDos">
            <li><a class="dropdown-item" href="tramitesyservicios.php#becas">Becas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="tramitesyservicios.php#calendario">Calendario académico</a></li>
            <!-- <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Plataforma educativa</a></li> -->
            <!-- <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="tramitesyservicios.php#tramites">Solicitud de bajas</a></li> -->
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="tramitesyservicios.php#tramites">Trámites</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="tramitesyservicios.php#reglamento">Reglamentos</a></li>
            <!-- <li><a class="dropdown-item" href="#">Certificaciones</a></li> -->
          </ul>
        </li>

          <a class="nav-item nav-link" href="contacto.php">Contacto</a>
        </div>
      
        <a class="btn btn-sm btn-outline-light loginbtn" href="login.php">Iniciar sesión</a>

    </div>
  </div>
</nav>

<script src="js/menu.js"></script>