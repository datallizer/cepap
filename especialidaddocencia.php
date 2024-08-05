<?php
session_start();
require 'dbcon.php';
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';

if (!empty($message)) {
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
    unset($_SESSION['message']); 
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "SELECT * FROM usuarios WHERE username = '$username'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message'] = "Bienvenido";
    } else {
        $_SESSION['message'] = "Contraseña incorrecta";
        header('Location: login.php');
        exit();
    }
} else {
    $_SESSION['message'] = "El usuario ingresado no existe";
    header('Location: login.php');
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumnos especialidad en docencia | CEPAP</title>
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
                        <h4>ALUMNOS ESPECIALIDAD EN DOCENCIA
                            <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Nuevo usuario
                            </button>
                        </h4>
                    </div>
                    <div class="card-body" style="overflow-y:scroll;">
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
                                $query = "SELECT * FROM usuarios WHERE rol_id = 4";
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">NUEVO ALUMNO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row" action="usercode.php" method="POST">
                    <div class="form-floating mb-3 col-12">
                                <input type="text" class="form-control" name="nombre" id="floatingInput" placeholder="Nombre" autocomplete="off" required>
                                <label for="floatingInput">Nombre</label>
                            </div>

                            <div class="form-floating mb-3 col-12 col-md-6">
                                <input type="text" class="form-control" name="apellidopaterno" id="floatingInput" placeholder="Apellido paterno" autocomplete="off" required>
                                <label for="floatingInput">Apellido paterno</label>
                            </div>

                            <div class="form-floating mb-3 col-12 col-md-6">
                                <input type="text" class="form-control" name="apellidomaterno" id="floatingInput" placeholder="Apellido materno" autocomplete="off" required>
                                <label for="floatingInput">Apellido materno</label>
                            </div>

                            <div class="form-floating mb-3 col-12">
                                <input type="email" class="form-control" name="username" id="floatingInput" placeholder="Correo" autocomplete="off" required>
                                <label for="floatingInput">Correo</label>
                            </div>

                            <div class="form-floating mb-3 col-12">
                                <input type="text" class="form-control" name="password" id="floatingInput" placeholder="Password" autocomplete="off" required minlength="10" maxlength="10">
                                <label for="floatingInput">Teléfono</label>
                            </div>

                            <div class="form-floating mb-3 col-12">
                                <select class="form-select" name="rol_id" id="rol_id" autocomplete="off" required>
                                    <option selected value="4">Especialidad en docencia</option>
                                </select>
                                <label for="floatingInput">Rol</label>
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