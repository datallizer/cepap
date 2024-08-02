<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete']))
{
    $registro_id = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM convocatorias WHERE id='$registro_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        header("Location: exito.html");
        exit(0);
    }
    else
    {
        header("Location: error.html");
        exit(0);
    }
}

if(isset($_POST['update']))
{
    $titulo = mysqli_real_escape_string($con, $_POST['titulo']);
    $descripcion = mysqli_real_escape_string($con, $_POST['apellidos']);
    $imagen =addslashes (file_get_contents($_FILES['imagen']['tmp_name']));
    $pdf = mysqli_real_escape_string($con, $_POST['pdf']);

    $query = "UPDATE convocatorias SET titulo='$titulo', descripcion='$descripcion', imagen='$imagen', pdf='$pdf'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        header("Location: exito.html");
        exit(0);
    }
    else
    {
        header("Location: error.html");
        exit(0);
    }

}


if(isset($_POST['save']))
{
    $titulo = mysqli_real_escape_string($con, $_POST['titulo']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
    $imagen =addslashes (file_get_contents($_FILES['imagen']['tmp_name']));
    $pdf = mysqli_real_escape_string($con, $_POST['pdf']);
    

    $query = "INSERT INTO convocatorias SET titulo='$titulo', descripcion='$descripcion', imagen='$imagen', pdf='$pdf'";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        header("Location: exito.html");
        exit(0);
    }
    else
    {
        header("Location: error.html");
        exit(0);
    }
}

?>

