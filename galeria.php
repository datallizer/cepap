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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/galeria.css">
  <link rel="shortcut icon" type="image/x-icon" href="images/ico.ico" />
  <title>Galería | CEPAP</title>
</head>

<body>
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v16.0" nonce="1tO5xGiO"></script>

  <?php include 'whatsapp.php'; ?>
  <?php include('menu.php'); ?>

  <div class="bannergaleria">
    <div class="container-fluid">
      <div class="row justify-content-center align-items-center">
        <div class="col-12 galeriah2 text-center" data-aos="zoom-in">
          <h2>GALERÍA</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="galeria">
    <div class="container-fluid">
      <div class="row justify-content-center align-items-center">
        <div class="col-10">
          <div class="row justify-content-center align-items-center mb-5">
            <?php
            $query = "SELECT * FROM galeria ORDER BY id DESC";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
              foreach ($query_run as $registro) {
            ?>
                <div data-aos="zoom-in-up" class="galerimg col-12 col-md-3" style="object-fit: cover;">
                  <a data-fslightbox="gallery" href="data:image/jpeg;base64,<?php echo  base64_encode($registro['medio']); ?>">
                    <img style="object-fit: cover;height:200px;width:100%;" src="data:image/jpeg;base64,<?php echo  base64_encode($registro['medio']); ?>" loading="lazy">
                  </a>
                </div>
            <?php
              }
            } else {
              echo "No se encontro ningun registro";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('footer.php'); ?>

  <script src="js/js.js"></script>
  <script src="js/fslightbox.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 600,
      once: true
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>