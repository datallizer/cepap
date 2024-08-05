<?php
session_start();
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';

if (!empty($message)) {
  echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                const message = " . json_encode($message) . ";
                Swal.fire({
                    //title: 'ADVERTENCIA',
                    text: message,
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Hacer algo si se confirma la alerta
                    }
                });
            });
        </script>";
  unset($_SESSION['message']);
}

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
  <title>Admisiones | CEPAP</title>
</head>
<style>
  .row {
    overflow-x: hidden;
  }

  h2 {
    margin-top: 50px;
  }
</style>

<body>
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v16.0" nonce="1tO5xGiO"></script>
  <?php include 'menu.php'; ?>
  <?php include 'admisionesform.php'; ?>
  <?php include 'footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
</body>

</html>