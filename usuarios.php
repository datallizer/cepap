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
    <title>Usuarios | CEPAP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/ico.ico" />
    <link rel="stylesheet" href="css/admin.css">
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
                        <h4>USUARIOS
                            <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Nuevo usuario
                            </button>
                        </h4>
                    </div>
                    <div class="card-body" style="overflow-y:scroll;">
                        <?php include('message.php'); ?>
                        <table id="miTabla" class="table table-bordered table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Username</th>
                                    <th>Rol</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM usuarios WHERE rol_id = 1 OR rol_id = 2";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $registro) {
                                ?>
                                        <tr>
                                            <td><?= $registro['nombre']; ?> <?= $registro['apellidopaterno']; ?> <?= $registro['apellidomaterno']; ?></td>
                                            <td><?= $registro['username']; ?></td>
                                            <td>
                                                <?php
                                                if ($registro['rol_id'] === "1") {
                                                    echo "Administrador";
                                                } else if ($registro['rol_id'] === "2") {
                                                    echo "Control escolar";
                                                } else if ($registro['rol_id'] === "3") {
                                                    echo "Alumno maestría en educacion";
                                                } else if ($registro['rol_id'] === "4") {
                                                    echo "Alumno especialidad en docencia";
                                                } else if ($registro['rol_id'] === "5") {
                                                    echo "Profesor";
                                                } else if ($registro['rol_id'] === "6") {
                                                    echo "Admision maestría en educacion";
                                                } else if ($registro['rol_id'] === "7") {
                                                    echo "Admision especialidad en docencia";
                                                } else {
                                                    echo "Error";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="editarusuario.php?id=<?= $registro['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>

                                                <form action="usercode.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete" value="<?= $registro['id']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<td><h5> No Record Found </h5></td><td></td><td></td><td></td>";
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">NUEVO USUARIO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="usercode.php" method="POST">
                        <div class="row">
                            <div class="col-12 mtop">
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" autocomplete="off" required>
                            </div>

                            <div class="col-6 mtop">
                                <input type="text" class="form-control" name="apellidopaterno" id="apellidopaterno" placeholder="Apellido paterno" autocomplete="off" required>
                            </div>

                            <div class="col-6 mtop">
                                <input type="text" class="form-control" name="apellidomaterno" id="apellidomaterno" placeholder="Apellido materno" autocomplete="off" required>
                            </div>

                            <div class="col-5 mtop">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario" autocomplete="off" required>
                            </div>

                            <div class="col-7 mtop">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" required>
                            </div>

                            <div class="col-12 mtop">
                                <select class="form-select" name="rol_id" id="rol_id" autocomplete="off" required>
                                    <option disabled>Categoría</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Control escolar</option>
                                    <!-- <option value="3">Alumno maestría en educacion</option>
                                    <option value="4">Alumno especialidad en docencia</option> -->
                                    <option value="5">Profesor</option>
                                </select>
                            </div>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="save">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#miTabla').DataTable({
                "order": [
                    [0, "asc"]
                ] // Ordenar la primera columna (índice 0) en orden descendente
            });
        });

    </script>
</body>

</html>