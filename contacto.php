<?php
session_start();
require 'dbcon.php';
?>
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
    <title>Contacto | CEPAP</title>
</head>

<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v16.0" nonce="1tO5xGiO"></script>

<?php include 'whatsapp.php'; ?>   
    <?php include 'menu.php'; ?>

    <div class="container-fluid">

        <div class="row justify-content-evenly align-items-center contactorow">
            <div class="col-10 col-md-3">
                <h3>CUENTANOS EN QUE <span style="color:#2f8dc4">PODEMOS</span> AYUDARTE</h3>
            </div>
            <div class="col-10 col-md-5">
                <form action="" method="post" class="row justify-content-center align-items-center">
                    <div class="form-floating col-6 inputcontacto">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Nombre</label>
                    </div>
                    <div class="form-floating col-6 inputcontacto">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Apellido</label>
                    </div>
                    <div class="form-floating col-8 inputcontacto">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating col-4 inputcontacto">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Teléfono</label>
                    </div>
                    <div class="form-floating col-12 inputcontacto">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Detalles</label>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-outline-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row justify-content-evenly align-items-center directoriorowcontacto">
            <div class="col-10">

                <div class="row justify-content-start align-items-center " id="directorio">
                    <div class="col-12 text-center">
                        <h2>DIRECTORIO</h2>
                    </div>
                    <?php
                    $query = "SELECT * FROM directorio";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $registro) {
                    ?>
                    <div class="col-12 col-md-6">
                        <div class="card mb-3" style="background-color:#3795cc;border:0px;">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-3">
                                    <img src="data:image/jpeg;base64,<?php echo  base64_encode($registro['medio']); ?>" class="img-fluid rounded-start" alt="Imagen" style="margin-bottom:0px;">
                                </div>

                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h5 class="card-title"><b><?= $registro['nombre']; ?></b></h5>
                                        <p class="card-text" style="margin-top:0px;font-size:12px;margin-bottom:10px"><b><?= $registro['puesto']; ?></b></p>
                                        <p><a href="mailto:<?= $registro['email']; ?>" class="card-text"><?= $registro['email']; ?></a></p>
                                        <p><a href="tel:<?= $registro['telefono']; ?>" class="card-text"><small style="color:#ffffff !important;" class="text-muted"><?= $registro['telefono']; ?></small></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    } else {
                        echo "<td colspan='7'><h5> No se encontro ningun registro </h5></td>";
                    }
                    ?>


                </div>
            </div>
        </div>


    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/js.js"></script>
</body>

</html>