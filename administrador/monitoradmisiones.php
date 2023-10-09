<?php

session_start();

if (!isset($_SESSION['rol'])) {
    header('location: ../index.php');
} else {
    if ($_SESSION['rol'] != 1) {
        header('location: ../index.php');
    }
}

require '../dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monitor admisiones | Administrador</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/ico.ico" />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include 'sidenav.php'; ?>

    <div class="container-fluid">
        <div class="row userrow margenbajo">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>ADMISIONES
                            <a style="margin:0px 5px;" href="dashboard.php" class="btn btn-dark btn-sm float-end">Inicio</a>
                            <button type="button" style="margin:0px 5px;" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Nueva admisión
                            </button>
                            <button class="btn btn-success btn-sm float-end" onclick="exportTableToExcel('admisiones')">Excel</button>
                        </h4>
                    </div>
                    <div class="card-body" style="overflow-y:scroll;">
                        <?php include('message.php'); ?>
                        <table class="table table-bordered table-striped" style="width: 100%;" id="admisiones">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Username</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>Estatus</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM admisiones ORDER BY id DESC";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $registro) {
                                ?>
                                        <tr>
                                            <td><?= $registro['nombre']; ?> <?= $registro['apellidopaterno']; ?> <?= $registro['apellidomaterno']; ?></td>
                                            <td><?= $registro['username']; ?></td>
                                            <td><?= $registro['telefono']; ?></td>
                                            <td><?= $registro['email']; ?></td>
                                            <td><?= $registro['status']; ?></td>
                                          
                                            <td>
                                                <a href="veradmision.php?id=<?= $registro['id']; ?>" class="btn btn-info btn-sm">Ver</a>

                                                <a href="editaradmision.php?id=<?= $registro['id']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                <form action="codeadmision.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete" value="<?= $registro['id']; ?>" class="btn btn-danger btn-sm">Borrar</button>
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
                                <input type="text" class="form-control" id="floatingInput telefono" name="telefono" required autocomplete="off" placeholder="">
                                <label for="floatingInput">Teléfono</label>
                            </div>

                            <div class="input-group col-12 form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput username" name="username" required autocomplete="off" pattern="[a-zA-Z\s]{1-50}" placeholder="">
                                <label for="floatingInput">Nombre de usuario</label>
                                <span class="input-group-text" id="basic-addon2">@cepap.mx</span>
                            </div>

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
<!--script modal-->
    <script>
    var status = document.getElementById("status");
    </script>      
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="js/js.js"></script>
    <script src="js/fslightbox.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../js/excel.js"></script>
</body>

</html>