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

    <?php include 'menu.php'; ?>

    <div style="height:85px;background-color: #0d405d;"></div>

    <div class="container-fluid">
        <div class="row justify-content-center ofertarow">
            <div class="col-6 button-container-left">
                <div class="">
                    <img src="images/maestriaeneducacion.jpg" alt="">
                    <a href="#maestria" alt="" class="btn btn-primary">Ver más</a>
                </div>
            </div>

            <div class="col-6 button-container">
                <div class="">
                    <img src="images/especialidadendocencia.jpg" alt="">
                    <a href="#especialidad" alt="" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center align-items-center ofertamyd" id="maestria">
            <div class="col-12 text-center" style="margin-bottom:30px;">
                <h2><b>MAESTRÍA EN EDUCACIÓN</b></h2>
                <p>Modalidad educativa: No escolarizada</p>
            </div>

            <div class="col-10 col-md-4"><img src="images/mapacurricularmaestria.png" alt=""></div>

            <div class="col-10 col-md-4 maestriacontenido">
                <h3 style="margin-bottom:30px">CONTENIDO DEL PROGRAMA</h3>
                <p>- Fin de aprendizaje</p>
                <p>- Perfil de egreso</p>
                <p>- Programa de investigación</p>
                <p>- Curso propedéutico</p>
                <p>- Perfil de ingreso</p>
                <p>- Administración y operatividad</p>
                <p>- Sustento teórico del modelo curricular</p>
                <p style="margin-bottom:50px">- Justificación de la propuesta curricular</p>
                <a download="planmaestria.pdf" href="docs/planmaestria.pdf" class="btn btn-light">Plan de estudios</a>
                <a style="margin-left:20px" download="mapamaestria.pdf" href="docs/mapamaestria.pdf" class="btn btn-light">Mapa curricular</a>
            </div>

        </div>

        <div class="row justify-content-center align-items-center ofertadocencia" id="especialidad">
            <div class="col-12 text-center" style="margin-bottom:30px;">
                <h2><b>ESPECIALIDAD EN DOCENCIA</b></h2>
                <p>Modalidad educativa: No escolarizada</p>
            </div>

            <div class="col-10 col-md-4 maestriacontenido order-2 order-md-1">
                <h3 style="margin-bottom:30px">CONTENIDO DEL PROGRAMA</h3>
                <p>- Fin de aprendizaje</p>
                <p>- Perfil de egreso</p>
                <p>- Programa de investigación</p>
                <p>- Curso propedeutico</p>
                <p>- Perfil de ingreso</p>
                <p>- Administración y operatividad</p>
                <p>- Sustento teórico del modelo curricular</p>
                <p style="margin-bottom:50px">- Justificación de la propuesta curricular</p>
                <a download="planespecialidad.pdf" href="docs/planespecialidad.pdf" class="btn btn-dark">Plan de estudios</a>
                <a style="margin-left:20px" download="mapaespecialidad.pdf" href="docs/mapaespecialidad.pdf" class="btn btn-dark">Mapa curricular</a>
            </div>

            <div class="col-10 col-md-4 order-1"><img src="images/mapacurricularmaestria.png" alt=""></div>

        </div>

        <div id="modeloeducativo" class="row justify-content-center align-items-center modeloeducativo">
            <div class="col-10 col-md-5 text-center">
                <h2>MODELO EDUCATIVO</h2>
                <img src="images/modeloeducativo.jpg" alt="">
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>