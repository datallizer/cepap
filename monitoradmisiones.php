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
    <title>Monitor admisiones | Administrador</title>
    <link rel="stylesheet" href="css/admin.css">
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
                <div class="row userrow margenbajo">
                    <div class="col-md-12 mt-5 mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>ADMISIONES
                                    <button type="button" style="margin:0px 5px;" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Nueva admisión
                                    </button>
                                </h4>
                            </div>
                            <div class="card-body" style="overflow-y:scroll;">
                                <table id="miTabla" class="table table-bordered table-striped" style="width: 100%;" id="admisiones">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Usuario / Email</th>
                                            <th>Teléfono</th>
                                            <th>Fecha de registro</th>
                                            <th>Estatus</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "
                                        SELECT admisiones.*, usuarios.*
                                        FROM admisiones
                                        JOIN usuarios ON usuarios.username = admisiones.email
                                        ORDER BY admisiones.id DESC
                                        ";
                                        
                                        $query_run = mysqli_query($con, $query);
                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $registro) {
                                        ?>
                                                <tr>
                                                    <td><?= $registro['id']; ?></td>
                                                    <td><?= $registro['nombre']; ?> <?= $registro['apellidopaterno']; ?> <?= $registro['apellidomaterno']; ?></td>
                                                    <td><?= $registro['email']; ?></td>
                                                    <td><?= $registro['telefono']; ?></td>
                                                    <td><?= $registro['registro']; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($registro['status'] === '0') {
                                                            echo "Nuevo";
                                                        } else if ($registro['status'] === '1') {
                                                            echo "Contactado";
                                                        } else if ($registro['status'] === '2') {
                                                            echo "En proceso";
                                                        } else if ($registro['status'] === '3') {
                                                            echo "Inscrito";
                                                        } else if ($registro['status'] === '4') {
                                                            echo "Finalizado";
                                                        } else if ($registro['status'] === '5') {
                                                            echo "Sin respuesta";
                                                        } else if ($registro['status'] === '6') {
                                                            echo "Expirado";
                                                        } else {
                                                            echo "Error, asigne un estatus valido o contacte a soporte";
                                                        }
                                                        ?>
                                                    </td>

                                                    <td style="min-width: 150px;">
                                                        <a href="veradmision.php?id=<?= $registro['id']; ?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>

                                                        <a href="editaradmision.php?id=<?= $registro['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                        <form action="codeadmision.php" method="POST" class="d-inline">
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

    <!-- Modal nueva admisión -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva admisión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="codeadmision.php" method="post">
                        <div class="row justify-content-center">
                            <div class="col-12 form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput nombre" name="nombre" required autocomplete="off" pattern="[a-zA-Z\s]{1-50}" placeholder="">
                                <label for="floatingInput">Nombre</label>
                            </div>

                            <div class="col-6 form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput apellidopaterno" name="apellidopaterno" required autocomplete="off" pattern="[a-zA-Z\s]{1-50}" placeholder="">
                                <label for="floatingInput">Apellido paterno</label>
                            </div>

                            <div class="col-6 form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput apellidomaterno" name="apellidomaterno" required autocomplete="off" pattern="[a-zA-Z\s]{1-50}" placeholder="">
                                <label for="floatingInput">Apellido materno</label>
                            </div>

                            <div class="col-12 form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput email" name="email" required autocomplete="off" placeholder="">
                                <label for="floatingInput">Correo</label>
                            </div>

                            <div class="col-12 form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="telefono" required autocomplete="off" placeholder="Teléfono" maxlength="10">
                                <label for="floatingInput">Teléfono</label>
                            </div>

                            <script>
                                // Obtener el elemento de entrada por su ID
                                var inputTelefono = document.getElementById("floatingInput");

                                // Agregar un listener para el evento "input"
                                inputTelefono.addEventListener("input", function() {
                                    // Reemplazar cualquier caracter que no sea un número con una cadena vacía
                                    this.value = this.value.replace(/[^0-9]/g, "");

                                    // Limitar la longitud a 10 dígitos
                                    if (this.value.length > 10) {
                                        this.value = this.value.slice(0, 10);
                                    }
                                });
                            </script>

                            <div style="margin-bottom:15px" class="col-7 form-floating">
                                <select class="form-select" name="detalles" id="floatingSelect detalles" required autocomplete="off">
                                    <option selected disabled>Seleccione una opción</option>
                                    <option value="3">Maestría en educación</option>
                                    <option value="4">Especialidad en docencía</option>
                                </select>
                                <label for="floatingSelect">Admision para</label>
                            </div>
                            <div class="col-5 form-floating mb-3">
                                <input type="password" class="form-control" id="floatingInput password" name="password" required autocomplete="off" placeholder="Contraseña">
                                <label for="floatingInput">Contraseña</label>
                            </div>
                            <!-- Campo estatus -->
                            <div style="margin-bottom:15px" class="col-12 form-floating">
                                <select class="form-select" name="status" id="floatingSelect status" required autocomplete="off">
                                    <option selected disabled>Seleccione una opción</option>
                                    <option value="0">Nuevo</option>
                                    <option value="1">Contactado</option>
                                    <option value="2">En proceso</option>
                                    <option value="3">Inscrito</option>
                                    <option value="4">Finalizado</option>
                                    <option value="5">Sin respuesta</option>
                                </select>
                                <label for="floatingSelect">Estatus</label>
                            </div>
                            <p style="font-size: 12px;">Todos los campos son obligatorios*</p>
                            <div class="col-2">
                                <button type="submit" name="save" class="btn btn-sm btn-dark p-2">Regístrarme</button>
                            </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
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