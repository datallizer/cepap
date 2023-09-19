<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: ../index.php');
    }else{
        if($_SESSION['rol'] != 1){
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
    <title>Ver admision | Administrador</title>
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
                        <h4>VER ADMISION 
                            <a href="monitoradmisiones.php" class="btn-sm btn btn-danger float-end">Regresar</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $registro_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM admisiones WHERE id='$registro_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $registro = mysqli_fetch_array($query_run);
                                ?>
                                <input type="hidden" name="registro_id" value="<?= $registro['id']; ?>">

                                <div class="row">
                                    <div class="col-4 mtop">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $registro['nombre']; ?>" disabled readonly>
                                    </div>

                                    <div class="col-4 mtop">
                                        <label for="apellidopaterno" class="form-label">Apellido paterno</label>
                                        <input type="text" class="form-control" name="apellidopaterno" id="apellidopaterno" value="<?= $registro['apellidopaterno']; ?>" disabled>
                                    </div>

                                    <div class="col-4 mtop">
                                        <label for="apellidomaterno" class="form-label">Apellido materno</label>
                                        <input type="text" class="form-control" name="apellidomaterno" id="apellidomaterno" value="<?= $registro['apellidomaterno']; ?>" disabled>
                                    </div>

                                    <div class="col-6 mtop">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" id="username" value="<?= $registro['username']; ?>" disabled>
                                    </div>

                                    <div class="col-6 mtop">
                                        <label for="telefono" class="form-label">Teléfono</label>
                                        <input type="text" class="form-control" name="telefono" id="telefono" value="<?= $registro['telefono']; ?>" disabled>
                                    </div>

                                    <div class="col-5 mtop">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="<?= $registro['email']; ?>" disabled>
                                    </div>

                                    <div class="col-7 mtop" >
                                    <label for="detalles" class="form-label">Categoría</label>
                                    <input type="text" class="form-control" name="detalles" id="detalles" value="<?php 
                                        if ( $registro['detalles'] === "3") {
                                            echo"Alumno maestría en educacion";
                                          } else if ($registro['detalles'] === "4") {
                                            echo"Alumno especialidad en docencia";
                                          } else {
                                          }
                                          ?>" disabled>
                                    </div>
                                    <!-- Estatus --> 
                                    <div class="col-7 mtop" >
                                    <label for="status" class="form-label">Estatus</label>
                                    
                                    <input type="text" class="form-control" name="status" id="status" value="<?php 
                                        if ( $registro['status'] === "0") {
                                            echo"Nuevo";
                                          } else if ($registro['status'] === "1") {
                                            echo"Contactado";
                                          } else if ($registro['status'] === "2"){
                                            echo"En proceso";
                                        } else if ($registro['status'] === "3"){
                                            echo"Inscrito";
                                        } else if ($registro['status'] === "4"){
                                            echo"Finalizado";
                                        } else if ($registro['status'] === "5"){
                                            echo"Sin respuesta";
                                          } else {
                                            
                                          }
                                          ?>" disabled>
                                    </div>

                                </div>
   
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
