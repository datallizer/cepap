<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete']))
{
    $registro_id = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM investigaciones WHERE id='$registro_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Eliminado exitosamente";
        header("Location: monitorinvestigaciones.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al eliminar, contacte a su proveedor";
        header("Location: monitorinvestigaciones.php");
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

    $query = "UPDATE `investigaciones` SET `titulo` = '$titulo', `descripcion` = '$descripcion', `nota` = '$nota', `fecha` = '$fecha', `autor` = '$autor' WHERE `articulos`.`id` = '$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Editado exitosamente";
        header("Location: monitorinvestigaciones.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al editar, contacte a su proveedor";
        header("Location: monitorinvestigaciones.php");
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

    $query = "INSERT INTO investigaciones SET titulo='$titulo', descripcion='$descripcion', nota='$nota', fecha='$fecha', autor='$autor', medios='$medios'";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Creado exitosamente";
        header("Location: monitorinvestigaciones.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al crear el articulo, contacte a su proveedor";
        header("Location: monitorinvestigaciones.php");
        exit(0);
    }
}

?>