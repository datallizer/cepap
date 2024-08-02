<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete']))
{
    $registro_id = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM noticias WHERE id='$registro_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Noticia eliminado exitosamente";
        header("Location: monitornoticias.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al eliminar la noticia";
        header("Location: monitornoticias.php");
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

    $query = "UPDATE `noticias` SET `titulo` = '$titulo', `descripcion` = '$descripcion', `nota` = '$nota', `fecha` = '$fecha', `autor` = '$autor' WHERE `noticias`.`id` = '$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Noticia editado exitosamente";
        header("Location: monitornoticias.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al editar la noticia";
        header("Location: monitornoticias.php");
        exit(0);
    }

}


if(isset($_POST['save']))
{
    $titulo = mysqli_real_escape_string($con, $_POST['titulo']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
    $nota = mysqli_real_escape_string($con, $_POST['nota']);
    $fecha = mysqli_real_escape_string($con, $_POST['fecha']);
    $autor = mysqli_real_escape_string($con, $_POST['autor']);
    $medios =addslashes (file_get_contents($_FILES['medios']['tmp_name']));

    $query = "INSERT INTO noticias SET titulo='$titulo', descripcion='$descripcion', nota='$nota', fecha='$fecha', autor='$autor', medios='$medios'";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Noticia creado exitosamente";
        header("Location: monitornoticias.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al crear la noticia";
        header("Location: monitornoticias.php");
        exit(0);
    }
}

?>