<?php
require 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Investigaciones | CEPAP</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/ico.ico" />
</head>

<body>
    <?php include 'menu.php'; ?>

    <div class="container-fluid">
        <div class="row justify-content-center" style="margin-top:120px;margin-bottom:70px;">
            <div class="col-12 text-center mb-5">
                <h2>INVESTIGACIONES</h2>
            </div>
            <?php
            $query = "SELECT * FROM investigaciones";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $registro) {
            ?>
                    <div class="col-12 col-md-8 mb-5">
                        <a href="investigacion.php?id=<?= $registro['id']; ?>" style="text-decoration: none;color:#000000;">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-10 col-md-4">
                                    <img src="data:image/jpeg;base64,<?php echo  base64_encode($registro['medios']); ?>" alt="Imagen nota">
                                </div>
                                <div class="col-10 col-md-8">
                                    <h3 class="margnews" style="text-transform:uppercase;"><?= $registro['titulo']; ?></h3>
                                    <p><?= $registro['descripcion']; ?></p>
                                    <button class="mt-3 btn btn-sm btn-primary float-end">Ver más</button>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php
                }
            } else {
                echo "No hay investigaciones disponibles por el momento";
            }
            ?>

        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>