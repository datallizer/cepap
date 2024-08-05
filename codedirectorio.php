<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete']))
{
    $registro_id = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM directorio WHERE id='$registro_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Noticia eliminado exitosamente";
        header("Location: directorio.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al eliminar la noticia";
        header("Location: directorio.php");
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

    $query = "UPDATE `directorio` SET `titulo` = '$titulo', `descripcion` = '$descripcion', `nota` = '$nota', `fecha` = '$fecha', `autor` = '$autor' WHERE `directorio`.`id` = '$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Noticia editado exitosamente";
        header("Location: directorio.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al editar la noticia";
        header("Location: directorio.php");
        exit(0);
    }

}


if(isset($_POST['save']))
{
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $puesto = mysqli_real_escape_string($con, $_POST['puesto']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telefono = mysqli_real_escape_string($con, $_POST['telefono']);
    $medio =addslashes (file_get_contents($_FILES['medio']['tmp_name']));

    $query = "INSERT INTO directorio SET nombre='$nombre', puesto='$puesto', email='$email', telefono='$telefono', medio='$medio'";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Tarjeta creada exitosamente";
        header("Location: directorio.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al crear la tarjeta";
        header("Location: directorio.php");
        exit(0);
    }
}

?>