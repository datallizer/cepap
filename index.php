<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/ico.ico">
    <link rel="stylesheet" href="css/style.css">
    <title>Inicio | CEPAP</title>
</head>
<body>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v16.0" nonce="1tO5xGiO"></script>

<?php include 'whatsapp.php'; ?>   
<?php include 'menu.php'; ?>

<div class="container-fluid">
<div class="container-fluid">
<div class="row hero justify-content-center align-items-center">
  <div class="col-11 text-center">
    <p>EN <span style="color:#65d3fd;">CEPAP</span> NO CURSAS MATERIAS.</p>
    <h1>¡VIVES EXPERIENCIAS DE APRENDIZAJE!</h1>
  </div>
</div>

<div class="row justify-content-evenly align-items-center nosotros">
    <div class="col-10 col-md-4 text-end" style="margin-bottom:30px">
      <h2>NOSOTROS</h2>
      <p style="text-align:justify;">¡Bienvenidos al Centro de Especialización en Procesos para el Aprendizaje! Somos un centro especializado en brindar soluciones innovadoras y efectivas para mejorar los procesos de aprendizaje de nuestros estudiantes. Nos esforzamos por brindar una educación de calidad y preparar a nuestros estudiantes para el éxito en sus carreras. Esperamos poder trabajar contigo y ayudarte a alcanzar tus metas académicas y profesionales.</p>
      <a href="nosotros.php" class="btn btn-sm btn-light"> Saber más...</a>
    </div>

    <div class="col-10 col-md-5 nosotrosframe">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/mpLr0KXKghE?si=5mxUfWSF6sm3wHWQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
  </div>

  <div class="row justify-content-evenly align-items-center oferta">
    <div class="col-10 text-center" style="margin-bottom:20px;">
      <h2>OFERTA EDUCATIVA</h2>
  </div>

    <div class="col-10 col-md-3 justify-content-center align-items-center">
      <div><h3><b>MAESTRÍAS</b></h3>
      <p>Nuestros profesores altamente calificados y experimentados son líderes en sus respectivos campos y están dedicados a proporcionar una educación de calidad a nuestros estudiantes.</p>
      <a href="ofertaeducativa.php#maestria" class="btn btn-sm btn-primary">Ver más</a>
    </div>
    </div>

    <div class="col-10 col-md-3">
      <img src="images/posgrado.jpg" alt="">
    </div>

  </div>

  <div class="row justify-content-evenly align-items-center oferta2">

  <div class="col-10 col-md-3 order-md-1 order-2">
      <img src="images/maestria.png" alt="">
    </div>

    <div class="col-10 col-md-3 justify-content-center align-items-center order-1 especialidadmovil">
      <div><h3><b>ESPECIALIDADES</b></h3>
      <p>Nuestras especialidades son una inversión en tu futuro profesional. Te proporcionamos las habilidades y conocimientos necesarios para avanzar en tu carrera y destacar en tu campo.</p>
      <a href="ofertaeducativa.php#especialidad" class="btn btn-sm btn-primary">Ver más</a>
    </div>
    </div>

  </div>


  <?php include 'admisionesform.php'; ?>

  <div class="row gacetarow justify-content-center">
    <div class="col-12 text-center">
      <h2>VIDA CEPAP</h2>
    </div>
    <div class="col-10 col-md-3 gaceta">
      <a href="noticias.php"><img src="images/noticias.jpg" alt=""></a>
    </div>

    <div class="col-10 col-md-3 gaceta">
      <a href="#"><img src="images/podcast.png" alt=""></a>
    </div>

    <div class="col-10 col-md-3 gaceta">
      <a href="articulos.php"><img src="images/articulo.jpg" alt=""></a>
    </div>

    <!-- <div class="col-10 col-md-3 gaceta">
      <a href="convocatorias.php"><img src="images/convocatoria.jpg" alt=""></a>
    </div> -->

    <div class="col-10 col-md-3 gaceta">
      <a href="galeria.php"><img src="images/galeria.jpg" alt=""></a>
    </div>

    <div class="col-10 col-md-3 gaceta">
      <a href="contacto.php#directorio"><img src="images/directorio.jpg" alt=""></a>
    </div>

    <div class="col-10 col-md-3 gaceta">
      <a href="investigaciones.php"><img src="images/investigacion.jpg" alt=""></a>
    </div>
  </div>

</div>

<?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</body>
</html>


