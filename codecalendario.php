<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete']))
{
    $registro_id = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM calendario WHERE id='$registro_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Noticia eliminado exitosamente";
        header("Location: calendario.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al eliminar la noticia";
        header("Location: calendario.php");
        exit(0);
    }
}

if(isset($_POST['update']))
{
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $titulo = mysqli_real_escape_string($con, $_POST['titulo']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
    $nota = mysqli_real_escape_string($con, $_POST['nota']);
    $fecha = mysqli_real_escape_string($con, $_POST['fecha']);
    $autor = mysqli_real_escape_string($con, $_POST['autor']);

    $query = "UPDATE `calendario` SET `titulo` = '$titulo', `descripcion` = '$descripcion', `nota` = '$nota', `fecha` = '$fecha', `autor` = '$autor' WHERE `calendario`.`id` = '$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Noticia editado exitosamente";
        header("Location: calendario.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al editar la noticia";
        header("Location: calendario.php");
        exit(0);
    }

}


if(isset($_POST['save']))
{
    $medio =addslashes (file_get_contents($_FILES['medio']['tmp_name']));

    $query = "INSERT INTO calendario SET medio='$medio'";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Calendario subido exitosamente";
        header("Location: calendario.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al subir el calendario";
        header("Location: calendario.php");
        exit(0);
    }
}

?>