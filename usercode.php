<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete']))
{
    $registro_id = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM usuarios WHERE id='$registro_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Usuario eliminado exitosamente";
        header("Location: usuarios.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al eliminar el usuario";
        header("Location: usuarios.php");
        exit(0);
    }
}

if(isset($_POST['update']))
{
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $apellidopaterno = mysqli_real_escape_string($con, $_POST['apellidopaterno']);
    $apellidomaterno = mysqli_real_escape_string($con, $_POST['apellidomaterno']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $rol_id = mysqli_real_escape_string($con, $_POST['rol_id']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE `usuarios` SET `nombre` = '$nombre', `apellidopaterno` = '$apellidopaterno', `apellidomaterno` = '$apellidomaterno', `password` = '$hashed_password', `rol_id` = '$rol_id' WHERE `usuarios`.`id` = '$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Usuario editado exitosamente";
        header("Location: usuarios.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al editar el usuario";
        header("Location: usuarios.php");
        exit(0);
    }

}


if(isset($_POST['save']))
{
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $apellidopaterno = mysqli_real_escape_string($con, $_POST['apellidopaterno']);
    $apellidomaterno = mysqli_real_escape_string($con, $_POST['apellidomaterno']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $rol_id = mysqli_real_escape_string($con, $_POST['rol_id']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO usuarios SET nombre='$nombre', apellidopaterno='$apellidopaterno', apellidomaterno='$apellidomaterno', username='$username', password='$hashed_password', rol_id='$rol_id'";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Usuario creado exitosamente";
        header("Location: usuarios.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al crear el usuario";
        header("Location: usuarios.php");
        exit(0);
    }
}

?>