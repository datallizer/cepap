<?php

session_start();
require 'dbcon.php';

if (isset($_POST['save'])) {
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$telefono = mysqli_real_escape_string($con, $_POST['telefono']);
	$status = '0';
	$registro = date('Y-m-d');
	$query = "INSERT INTO admisiones SET registro='$registro', email='$email', telefono='$telefono', status='$status' ";

	$query_run = mysqli_query($con, $query);
	if ($query_run) {
		$nombre = mysqli_real_escape_string($con, $_POST['nombre']);
		$apellidopaterno = mysqli_real_escape_string($con, $_POST['apellidopaterno']);
		$apellidomaterno = mysqli_real_escape_string($con, $_POST['apellidomaterno']);
		$password = mysqli_real_escape_string($con, $_POST['telefono']);
		$rol_id = mysqli_real_escape_string($con, $_POST['detalles']);

		$sql = "INSERT INTO usuarios SET nombre='$nombre', apellidopaterno='$apellidopaterno', apellidomaterno='$apellidomaterno', username='$email', password='$password', rol_id='$rol_id'";

		$query_run = mysqli_query($con, $sql);
		if ($query_run) {

			$sql = "INSERT INTO informacion SET username='$email'";

			$query_run = mysqli_query($con, $sql);
			if ($query_run) {
				$_SESSION['message'] = "Usuario creado exitosamente";
				header("Location: perfil.php");
				exit(0);
			} else {
				$_SESSION['message'] = "Error al inicializar tu información";
				header("Location: error.html");
				exit(0);
			}
		} else {
			$_SESSION['message'] = "Error al crear el usuario";
			header("Location: error.html");
			exit(0);
		}
	} else {
		$_SESSION['message'] = "Error en la admisión";
		header("Location: error.html");
		exit(0);
	}
}
