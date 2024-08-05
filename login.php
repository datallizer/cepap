<?php
session_start();
require 'dbcon.php';
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';

if (!empty($message)) {
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                const message = " . json_encode($message) . ";
                Swal.fire({
                    title: message,
                    //text: message,
                    icon: 'info',
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
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "SELECT * FROM usuarios WHERE username='$username'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $row['id'];
            $_SESSION['rol'] = $row['rol_id']; // Guardar el rol en la sesión
            header("Location: dashboard.php"); // Redirigir a la página deseada
            exit();
        } else {
            //COntraseña incorrecta
            header("Location: login.php"); // Redirigir a la página deseada
            $_SESSION['message'] = "La contraseña es incorrecta";
            exit();
        }
    } else {
        // Usuario no encontrado
        header("Location: login.php"); // Redirigir a la página deseada
        $_SESSION['message'] = "Usuario no encontrado";
        exit();
    }
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
    <title>Inicio | CEPAP</title>
</head>

<body>

    <?php include 'menu.php'; ?>

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center loginform">
            <div class="col-11 col-md-4">
                <h2>INICIAR SESION</h2>
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" id="username">
                        <label for="floatingInput">Usuario</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" id="password">
                        <label for="floatingPassword">Contraseña</label>
                    </div>
                    <button style="width: 100%;" class="btn btn-primary p-3">Ingresar</button>
                </form>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
    <script src="js/js.js"></script>
</body>

</html>