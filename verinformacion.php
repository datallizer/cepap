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
    <title>Ver informacion de usuarios | Administrador</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
<?php include 'sidenav.php'; ?>
  
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>INFORMACION DE USUARIOS
                            <a href="monitorinformacion.php" class="btn btn-danger btn-sm float-end">Regresar</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $registro_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM informacion WHERE id='$registro_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $registro = mysqli_fetch_array($query_run);
                                ?>
                                <input type="hidden" name="registro_id" value="<?= $registro['id']; ?>">

                                <div class="row">
                                    <div class="col-12 col-md-4 mt-2">
                                        <label for="username" class="form-label">Nombre de usuario</label>
                                        <input type="text" class="form-control" value="<?= $registro['username']; ?>" disabled>
                                    </div>

                                    <div class="col-12 col-md-4 mt-2">
                                        <label for="estado" class="form-label">Estado</label>
                                        <input type="text" class="form-control" value="<?= $registro['estado']; ?>" disabled>
                                    </div>

                                    <div class="col-12 col-md-4 mt-2">
                                        <label for="pais" class="form-label">País</label>
                                        <input type="text" class="form-control"value="<?= $registro['pais']; ?>" disabled>
                                    </div>

                                    <div class="col-12 col-md-6 mt-2">
                                        <label for="instituto" class="form-label">Instituto de procedencia</label>
                                        <input type="text" class="form-control"value="<?= $registro['instituto']; ?>" disabled>
                                    </div>

                                    <div class="col-12 col-md-6 mt-2">
                                        <label for="grado" class="form-label">Ultimo grado de estudios</label>
                                        <input type="text" class="form-control"value="<?= $registro['grado']; ?>" disabled>
                                    </div>

                                    <div class="col-12 col-md-6 mt-2">
                                        <label for="titulacion" class="form-label">Estatus de titulacion</label>
                                        <input type="text" class="form-control"value="<?= $registro['titulacion']; ?>" disabled>
                                    </div>

                                    <div class="col-12 col-md-6 mt-2">
                                        <label for="cedula" class="form-label">Numero de cedula</label>
                                        <input type="text" class="form-control"value="<?= $registro['cedula']; ?>" disabled>
                                    </div>

                                    <div class="col-12 col-md-6 mt-2">
                                        <label for="area" class="form-label">Área en la que se desempeña</label>
                                        <input type="text" class="form-control"value="<?= $registro['area']; ?>" disabled>
                                    </div>

                                    <div class="col-12 col-md-6 mt-2">
                                        <label for="nacimiento" class="form-label">Fecha de nacimiento</label>
                                        <input type="text" class="form-control"value="<?= $registro['nacimiento']; ?>" disabled>
                                    </div>

                                    <div class="col-12 col-md-6 mt-2">
                                        <label for="estatus" class="form-label">Completo (1) | Incompleto (0)</label>
                                        <input type="text" class="form-control"value="<?= $registro['estatus']; ?>" disabled>
                                    </div>
                                </div>
                        <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
