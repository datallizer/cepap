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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monitor informacion | CEPAP</title>
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/ico.ico" />
</head>

<body class="sb-nav-fixed">
    <?php include 'sidenav.php'; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>INFORMACIÓN PERSONAL ALUMNOS</h4>
                            </div>
                            <div class="card-body">
                                
                                <table class="table table-bordered table-striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Titulacion</th>
                                            <th>Estatus</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM informacion";
                                        $query_run = mysqli_query($con, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $registro) {
                                        ?>
                                                <tr>
                                                    <td><?= $registro['username']; ?></td>
                                                    <td><?= $registro['titulacion']; ?></td>
                                                    <td><?php
                                                        if ($registro['estatus'] === "1") {
                                                            echo "Informacion completa";
                                                        } else {
                                                            echo "Incompleto";
                                                        }
                                                        ?> </td>
                                                    <td>
                                                        <a href="verinformacion.php?id=<?= $registro['id']; ?>" class="btn btn-info btn-sm">Ver</a>

                                                        <a href="editarinformacion.php?id=<?= $registro['id']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                        <form action="codeinformacion.php" method="POST" class="d-inline">
                                                            <button type="submit" name="delete" value="<?= $registro['id']; ?>" class="btn btn-danger btn-sm">Borrar</button>
                                                        </form>

                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "<td><h5> No hay registros disponibles por el momento </h5></td><td></td><td></td><td></td><td></td>";
                                        }
                                        ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>