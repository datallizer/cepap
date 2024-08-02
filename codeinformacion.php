<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete']))
{
    $registro_id = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM informacion WHERE id='$registro_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Eliminado exitosamente";
        header("Location: monitorinformacion.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al eliminar";
        header("Location: monitorinformacion.php");
        exit(0);
    }
}

if(isset($_POST['update']))
{
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $estado = mysqli_real_escape_string($con, $_POST['estado']);
    $pais = mysqli_real_escape_string($con, $_POST['pais']);
    $instituto = mysqli_real_escape_string($con, $_POST['instituto']);
    $grado = mysqli_real_escape_string($con, $_POST['grado']);
    $titulacion = mysqli_real_escape_string($con, $_POST['titulacion']);
    $cedula = mysqli_real_escape_string($con, $_POST['cedula']);
    $area = mysqli_real_escape_string($con, $_POST['area']);
    $nacimiento = mysqli_real_escape_string($con, $_POST['nacimiento']);
    $estatus = mysqli_real_escape_string($con, $_POST['estatus']);

    $query = "UPDATE `informacion` SET `estado` = '$estado', `pais` = '$pais', `instituto` = '$instituto', `grado` = '$grado', `titulacion` = '$titulacion', `cedula` = '$cedula', `area` = '$area', `nacimiento` = '$nacimiento', `estatus` = '$estatus' WHERE `informacion`.`id` = '$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Editado exitosamente";
        header("Location: monitorinformacion.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al editar";
        header("Location: monitorinformacion.php");
        exit(0);
    }

}




?>