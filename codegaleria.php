<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete']))
{
    $registro_id = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM galeria WHERE id='$registro_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Imagen eliminada exitosamente";
        header("Location: monitorgaleria.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al eliminar la imagen";
        header("Location: monitorgaleria.php");
        exit(0);
    }
}

if(isset($_POST['save']))
{
    $medio =addslashes (file_get_contents($_FILES['medio']['tmp_name']));

    $query = "INSERT INTO galeria SET medio='$medio'";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Imagen subida exitosamente";
        header("Location: monitorgaleria.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al subir la imagen";
        header("Location: monitorgaleria.php");
        exit(0);
    }
}

?>