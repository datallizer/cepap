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
    <title>Editar admision | Administrador</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
<?php include 'sidenav.php'; ?>
  
    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>EDITOR DE ADMISION 
                            <a href="monitoradmisiones.php" class="btn btn-danger btn-sm float-end">REGRESAR</a>
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
                                <form action="codeadmision.php" method="POST">
                                <input type="hidden" name="id" value="<?= $registro['id']; ?>">

                                <div class="row mtop">
                                    <div class="col-12">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $registro['nombre']; ?>">
                                    </div>

                                    <div class="col-6">
                                        <label for="apellidopaterno" class="form-label">Apellido paterno</label>
                                        <input type="text" class="form-control" name="apellidopaterno" id="apellidopaterno" value="<?= $registro['apellidopaterno']; ?>">
                                    </div>

                                    <div class="col-6">
                                        <label for="apellidomaterno" class="form-label">Apellido materno</label>
                                        <input type="text" class="form-control" name="apellidomaterno" id="apellidomaterno" value="<?= $registro['apellidomaterno']; ?>">
                                    </div>

                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                                        value="<?= $registro['email']; ?>">
                                    </div>

                                    <div class="col-12 input-group">
                                        <input type="text" class="form-control" name="username" id="username" value="<?= $registro['username']; ?>" disabled>
                                        <span class="input-group-text spfile">@cepap.mx</span>
                                    </div>

                                    <div class="col-5">
                                        <label for="telefono" class="form-label">Teléfono</label>
                                        <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Teléfono"
                                        value="<?= $registro['telefono']; ?>">
                                    </div>
                                </div> 
                                
                                <div style="margin-bottom:15px" class="col-12 form-floating">
                                <select class="form-select" name="status" id="floatingSelect status" required autocomplete="off">
                                    <option selected disabled><?php
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
                                                } else {
                                                    echo "Error, asigne un estatus actual";
                                                }
                                                ?></option>
                                    <option value="0">Nuevo</option>
                                    <option value="1">Contactado</option>
                                    <option value="2">En proceso</option>
                                    <option value="3">Inscrito</option>
                                    <option value="4">Finalizado</option>
                                    <option value="5">Sin respuesta</option>
                                </select>
                                
                                <label for="floatingSelect">Estatus</label>
                            </div>
                                <div class="col-12 text-center mt-2 mb-2">
                                    <button type="submit" name="update" class="btn btn-warning">
                                        Actualizar usuario
                                    </button>
                                </div>


        </div>
    </div>
                                    
</form>
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

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
