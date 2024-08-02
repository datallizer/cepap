<?php
session_start();
require 'dbcon.php';
$message = isset($_SESSION['message']) ? $_SESSION['message'] : ''; // Obtener el mensaje de la sesión

if (!empty($message)) {
    // HTML y JavaScript para mostrar la alerta...
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                const message = " . json_encode($message) . ";
                Swal.fire({
                    title: 'NOTIFICACIÓN',
                    text: message,
                    icon: 'info',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Hacer algo si se confirma la alerta
                    }
                });
            });
        </script>";
    unset($_SESSION['message']); // Limpiar el mensaje de la sesión
}

//Verificar si existe una sesión activa y los valores de usuario y contraseña están establecidos
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Consultar la base de datos para verificar si los valores coinciden con algún registro en la tabla de usuarios
    $query = "SELECT * FROM usuarios WHERE username = '$username'";
    $result = mysqli_query($con, $query);

    // Si se encuentra un registro coincidente, el usuario está autorizado
    if (mysqli_num_rows($result) > 0) {
        // El usuario está autorizado, se puede acceder al contenido
    } else {
        // Redirigir al usuario a una página de inicio de sesión
        header('Location: login.php');
        exit(); // Finalizar el script después de la redirección
    }
} else {
    // Redirigir al usuario a una página de inicio de sesión si no hay una sesión activa
    header('Location: login.php');
    exit(); // Finalizar el script después de la redirección
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/ico.ico">
    <link rel="stylesheet" href="css/admin.css">
    <title>Dashboard | CEPAP</title>
</head>

<body class="sb-nav-fixed">
    <?php include 'sidenav.php'; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">

            <div class="container-fluid">
                <div class="row justify-content-around align-items-top mt-5 dashboardrow">
                    <div class="col-3 text-center dashboardcard">
                        <h3>ADMISIONES NUEVAS</h3>
                        <?php
                        $sql = "SELECT COUNT(*) AS total FROM admisiones WHERE status = 0";
                        $result = $con->query($sql);
                        
                        // Obtener el resultado
                        $totalAdmisiones = 0;
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $totalAdmisiones = $row["total"];
                        } else {
                            echo "0";
                        }
                        ?>
                        <p><?php echo $totalAdmisiones; ?></p>
                    </div>

                    <div class="col-3 text-center dashboardcard">
                        <h3>ADMISIONES EN PROCESO</h3>
                        <?php
                        $sql = "SELECT COUNT(*) AS total FROM admisiones WHERE status = 2";
                        $result = $con->query($sql);
                        
                        // Obtener el resultado
                        $totalAdmisiones = 0;
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $totalAdmisiones = $row["total"];
                        } else {
                            echo "0";
                        }
                        ?>
                        <p><?php echo $totalAdmisiones; ?></p>
                    </div>

                    <div class="col-3 text-center dashboardcard">
                        <h3>ADMISIONES CONTACTADAS</h3>
                        <?php
                        $sql = "SELECT COUNT(*) AS total FROM admisiones WHERE status = 1";
                        $result = $con->query($sql);
                        
                        // Obtener el resultado
                        $totalAdmisiones = 0;
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $totalAdmisiones = $row["total"];
                        } else {
                            echo "0";
                        }
                        ?>
                        <p><?php echo $totalAdmisiones; ?></p>
                    </div>

                    <div class="col text-center dashboardcard">
                        <h3>ADMISIONES INSCRITAS</h3>
                        <?php
                        $sql = "SELECT COUNT(*) AS total FROM admisiones WHERE status = 3";
                        $result = $con->query($sql);
                        
                        // Obtener el resultado
                        $totalAdmisiones = 0;
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $totalAdmisiones = $row["total"];
                        } else {
                            echo "0";
                        }
                        ?>
                        <p><?php echo $totalAdmisiones; ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/js.js"></script>
</body>

</html>