<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: ../index.php');
    }else{
        if($_SESSION['rol'] != 2){
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
    <title>Editar informacion | Administrador</title>
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
                        <h4>EDITOR DE INFORMACION 
                            <a href="monitorinformacion.php" class="btn btn-danger btn-sm float-end">REGRESAR</a>
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
                                <form action="codeinformacion.php" method="POST">
                                <input type="hidden" name="id" value="<?= $registro['id']; ?>">

                                <div class="row mtop">
                                    <div class="col-12 input-group">
                                        <input type="text" class="form-control" name="username" id="username" value="<?= $registro['username']; ?>" disabled>
                                        <span class="input-group-text spfile">@cepap.mx</span>
                                    </div>

                                    <div class="col-6">
                                        <label for="estado" class="form-label">Estado de procedencia</label>
                                        <input type="text" class="form-control" name="estado" id="estado" value="<?= $registro['estado']; ?>">
                                    </div>

                                    <div class="col-6">
                                        <label for="pais" class="form-label">País de procedencia</label>
                                        <input type="text" class="form-control" name="pais" id="pais" value="<?= $registro['pais']; ?>">
                                    </div>

                                    <div class="col-12">
                                        <label for="instituto" class="form-label">Instituto</label>
                                        <input type="text" class="form-control" name="instituto" id="instituto"
                                        value="<?= $registro['instituto']; ?>">
                                    </div>

                                    <div class="col-4">
                                        <label for="grado" class="form-label">Ultimo grado de estudios</label>
                                        <input type="text" class="form-control" name="grado" id="grado"
                                        value="<?= $registro['grado']; ?>">
                                    </div>

                                    <div class="col-4">
                                        <label for="titulacion" class="form-label">Estatus de titulacion</label>
                                        <input type="text" class="form-control" name="titulacion" id="titulacion"
                                        value="<?= $registro['titulacion']; ?>">
                                    </div>

                                    <div class="col-4">
                                        <label for="cedula" class="form-label">Numero de cedula</label>
                                        <input type="text" class="form-control" name="cedula" id="cedula"
                                        value="<?= $registro['cedula']; ?>">
                                    </div>

                                    <div class="col-12">
                                        <label for="area" class="form-label">Área en la que se desempeña</label>
                                        <input type="text" class="form-control" name="area" id="area"
                                        value="<?= $registro['area']; ?>">
                                    </div>

                                    <div class="col-5">
                                        <label for="nacimiento" class="form-label">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" name="nacimiento" id="nacimiento"
                                        value="<?= $registro['nacimiento']; ?>">
                                    </div>

                                    <div class="col-7">
                                        <label for="estatus" class="form-label">Informacion completa (1) | Incompleta (0)</label>
                                        <input type="text" class="form-control" name="estatus" id="estatus"
                                        value="<?= $registro['estatus']; ?>">
                                    </div>
                                
   
                                <div class="col-12 text-center mt-2 mb-2">
                                    <button type="submit" name="update" class="btn btn-warning">
                                        Actualizar usuario
                                    </button>
                                </div>

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
