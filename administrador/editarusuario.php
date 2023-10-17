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
    <title>Editar usuarios | Administrador</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>
<?php include 'sidenav.php'; ?>
  
    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Editor de usuario 
                            <a href="usuarios.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $registro_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM usuarios WHERE id='$registro_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $registro = mysqli_fetch_array($query_run);
                                ?>
                                <form action="usercode.php" method="POST">
                                <input type="hidden" name="id" value="<?= $registro['id']; ?>">

                                <div class="row mtop">
                                    <div class="col-12">
                                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $registro['nombre']; ?>">
                                    </div>

                                    <div class="col-6">
                                        <input type="text" class="form-control" name="apellidopaterno" id="apellidopaterno" value="<?= $registro['apellidopaterno']; ?>">
                                    </div>

                                    <div class="col-6">
                                        <input type="text" class="form-control" name="apellidomaterno" id="apellidomaterno" value="<?= $registro['apellidomaterno']; ?>">
                                    </div>

                                    <div class="col-12 input-group">
                                        <input type="text" class="form-control" name="username" id="username" value="<?= $registro['username']; ?>" disabled>
                                        <span class="input-group-text spfile">@cepap.mx</span>
                                    </div>

                                    <div class="col-5">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                                        value="<?= $registro['password']; ?>">
                                    </div>

                                    <div class="col-7">
                                        <select class="form-select" name="rol_id" id="rol_id"  autocomplete="off" required>
                                            <option selected disabled><?php
                                                if ( $registro['rol_id'] === "1") {
                                                    echo"Administrador";
                                                  } else if ($registro['rol_id'] === "2") {
                                                    echo"Control escolar";
                                                  } else if ($registro['rol_id'] === "3") {
                                                    echo"Alumno maestría en educacion";
                                                  } else if ($registro['rol_id'] === "4") {
                                                    echo"Alumno especialidad en docencia";
                                                  } else if ($registro['rol_id'] === "5") {
                                                    echo"Profesor";
                                                  } else {
                                                  }
                                                  ?>    
                                                </option>
                                            <option value="1">Administrador</option>
                                            <option value="2">Control escolar</option>
                                            <option value="3">Alumno maestría en educacion</option>
                                            <option value="4">Alumno educacion en docencia</option>
                                            <option value="5">Docente</option>
                                        </select>
                                </div>
   
                                <div class="col-12 text-center">
                                    <button type="submit" name="update" class="btn btn-primary">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
