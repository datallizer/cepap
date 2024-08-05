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
    <title>Monitor noticias | Administrador</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/ico.ico" />
</head>
<body>
<?php include 'sidenav.php'; ?>

<div class="container-fluid">
<div class="row userrow">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>CONVOCATORIAS
                <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Nueva convocatoria
                </button>

                    <a style="margin:0px 5px;" href="dashboard.php" class="btn btn-dark btn-sm float-end">Inicio</a>
                </h4>
            </div>
            <div class="card-body">
            
                <table class="table table-bordered table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descripcion</th>
                            <th>Fecha de publicacion</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM noticias";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $registro)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $registro['titulo']; ?></td>
                                        <td><?= $registro['descripcion']; ?></td>
                                        <td><?= $registro['fecha']; ?></td>
                                        <td>
                                            <a href="verusuario.php?id=<?= $registro['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                                            
                                            <a href="editarusuario.php?id=<?= $registro['id']; ?>" class="btn btn-success btn-sm">Editar</a>
                                            <form action="code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete" value="<?=$registro['id'];?>" class="btn btn-danger btn-sm">Borrar</button>
                                            </form>
                                           
                                    </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<td><h5> No hay convocatorias disponibles por el momento </h5></td><td></td><td></td><td></td>";
                            }
                        ?>
                        
                    </tbody>
                </table>

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
        <h1 class="modal-title fs-5" id="exampleModalLabel">NUEVA CONVOCATORIA</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="usercode.php" method="POST">
            <div class="row">
                <div class="col-12 mtop">
                    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo" autocomplete="off" required>
                </div>

                <div class="col-6 mtop">
                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" autocomplete="off" required>
                </div>

                <div class="col-6 mtop">
                    <input type="text" class="form-control" name="nota" id="nota" placeholder="Nota" autocomplete="off" required>
                </div>

                <div class="col-12 mtop">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha" id="fecha" placeholder="fecha" autocomplete="off" required>
                </div>

                <div class="col-12 mtop">
                    <label for="fecha" class="form-label">Imagen</label>
                    <input type="file" class="form-control" name="medios" id="medios" placeholder="medios" autocomplete="off" required>
                </div>

                <div class="col-12 mtop">
                    <label for="fecha" class="form-label">PDF</label>
                    <input type="file" class="form-control" name="pdf" id="pdf" placeholder="pdf" autocomplete="off" required>
                </div>
            </div>
                       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name="update">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
