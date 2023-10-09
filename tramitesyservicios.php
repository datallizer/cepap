<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/ico.ico">
    <link rel="stylesheet" href="css/style.css">
    <title>Inicio | CEPAP</title>
</head>
<body>
    
<?php include 'menu.php'; ?>

<div class="container-fluid">

<div id="becas" class="row becasrow">
  <div class="col-12 text-center">
    <h2>BECAS PARA MAESTRÍAS Y ESPECIALIDADES</h2>
    <img src="images/becas.jpg" alt="becas">
    <p>No cobramos inscripción</p>
  </div>
</div>


  <div id="tramites" class="row justify-content-center align-items-center tramitescbi">
    <div class="col-10 col-md-5">
      <h2>TRÁMITES</h2>
      <p>Realiza los siguientes pasos para cualquiera de los trámites que tenemos disponibles para ti</p>
      <p><i class="bi bi-1-circle-fill"></i> Realiza tu pago en caso de que vayas a solicitar una constancia de estudios</p>
      <p><i class="bi bi-2-circle-fill"></i> Llena el formulario correspondiente</p>
      <p><i class="bi bi-3-circle-fill"></i> Serás redirigido a la aplicación de whatsapp</p>
      <p><i class="bi bi-4-circle-fill"></i> Envía el mensaje que se autocompletara en la aplicación</p>
    </div>
    <div class="col-10 col-md-5 formulariostramites">
    <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        Solicitud de constancia
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="solicitudconstancias.php" method="post" class="row justify-content-center" enctype="multipart/form-data">
            <div class="col-6">
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="col-6">
              <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos">
            </div>
            <div class="col-12">
              <input type="text" name="matricula" id="matricula" class="form-control" placeholder="Matricula">
            </div>
            <div class="col-12">
              <input type="text" name="detalles" id="detalles" class="form-control" placeholder="Detalles">
            </div>
            <div class="col-12 pago">
              <label for="pago" class="form-label">Suba su comprobante de pago</label>
              <input class="form-control" type="file" name="pago" id="pago">
            </div>
            <div class="col-12 col-md-3 mt-3">
              <button type="submit"class="btn btn-primary">Enviar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Solicitud de baja 
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <form action="solicitudbaja.php" method="post" class="row justify-content-center">
      <div class="col-6">
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="col-6">
              <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos">
            </div>
            <div class="col-12">
              <input type="text" name="matricula" id="matricula" class="form-control" placeholder="Matricula">
            </div>
            <div class="col-12">
              <input type="text" name="detalles" id="detalles" class="form-control" placeholder="Detalles">
            </div>
            <div class="col-3">
              <button type="submit"class="btn btn-primary">Enviar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Solicitud de informacion
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <form action="solicitudinformacion.php" method="post" class="row justify-content-center">
            <div class="col-6">
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="col-6">
              <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos">
            </div>
            <div class="col-12">
              <input type="text" name="matricula" id="matricula" class="form-control" placeholder="Matricula">
            </div>
            <div class="col-12">
              <input type="text" name="detalles" id="detalles" class="form-control" placeholder="Detalles">
            </div>
            <div class="col-3">
              <button type="submit"class="btn btn-primary">Enviar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>

  <div id="calendario" class="row justify-content-center align-items-center calendario">
    <div class="col-12 col-md-8 text-center">
      <h2>CALENDARIO ACADÉMICO</h2>
      <img src="images/calendario.jpg" alt="">
    </div>
  </div>

  <div id="reglamento" class="row reglamentos justify-content-evenly align-items-center">
    <div class="col-2 reglatxt">REGLAMENTOS</div>
    <div class="col-10 col-md-3"><a download="reglamentodocencia.pdf" href="docs/reglamentodocencia.pdf"><img src="images/reglamentoespecialidad.jpg" alt=""></a></div>
    <div class="col-10 col-md-3"><a download="reglamentomaestria.pdf" href="docs/reglamentomaestria.pdf"><img src="images/reglamentomaestria.jpg" alt=""></a></div>
  </div>
</div>

<?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/js.js"></script>
</body>
</html>