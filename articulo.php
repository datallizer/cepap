<?php
require 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artículo | CEPAP</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v16.0" nonce="1tO5xGiO"></script>
    <?php include 'menu.php'; ?>

    <div class="container" style="margin-top:120px;margin-bottom:70px;">
        <?php
        if (isset($_GET['id'])) {
            $registro_id = mysqli_real_escape_string($con, $_GET['id']);
            $query = "SELECT * FROM articulos WHERE id='$registro_id' ";
            $query_run = mysqli_query($con, $query);
            if (mysqli_num_rows($query_run) > 0) {
                $registro = mysqli_fetch_array($query_run);
        ?>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <h4 style="text-transform:uppercase;font-weight:700;"><?= $registro['titulo']; ?></h4>
                        <input type="hidden" name="registro_id" value="<?= $registro['id']; ?>">

                        <div class="row justify-content-center">
                            <div class="col-12 mt-3">
                                <pre><?= $registro['descripcion']; ?></pre>
                            </div>

                            <div class="col-12 mt-3 mb-4">
                                <img src="data:image/jpeg;base64,<?php echo  base64_encode($registro['medios']); ?>" alt="Imagen nota">
                            </div>

                            <div class="col-12">
                                <pre><?= $registro['nota']; ?></pre>
                            </div>

                            <div class="col-12">
                                <p><b>Fecha de publicacion:</b> <?= $registro['fecha']; ?></p>
                                <p><b>Autor:</b> <?= $registro['autor']; ?></p>
                            </div>

                            <div class="col-12 mt-5 mb-5">
                                <a href="articulos.php" class="btn btn-light float-end">Regresar</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            } else {
                echo "<h4>No se encontro ningun articulo con este ID</h4>";
            }
        }
        ?>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>