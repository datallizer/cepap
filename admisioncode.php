<?php
	
session_start();

require 'dbcon.php';

if(isset($_POST['save']))
{
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $apellidopaterno = mysqli_real_escape_string($con, $_POST['apellidopaterno']);
    $apellidomaterno = mysqli_real_escape_string($con, $_POST['apellidomaterno']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$telefono = mysqli_real_escape_string($con, $_POST['telefono']);
	$detalles = mysqli_real_escape_string($con, $_POST['detalles']);
	$status = mysqli_real_escape_string($con, $_POST['Estayus']);
	$asunto = 'ADMISION';
	$mensaje = "Nombre: ".$nombre. " " .$apellidomaterno. " " .$apellidopaterno. " Email: " .$email." Telefono: ".$telefono." Username: ".$username." Detalles: ".$detalles."". $_POST['mensaje'];

	 $_SESSION['username'] = $username;

	if(mail('admisiones@cepap.edu.mx', $asunto, $mensaje)){
	 	echo "Correo enviado";
	 }

    $query = "INSERT INTO admisiones SET nombre='$nombre', apellidopaterno='$apellidopaterno', apellidomaterno='$apellidomaterno', username='$username', email='$email', telefono='$telefono', detalles='$detalles' ";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
		$nombre = mysqli_real_escape_string($con, $_POST['nombre']);
		$apellidopaterno = mysqli_real_escape_string($con, $_POST['apellidopaterno']);
		$apellidomaterno = mysqli_real_escape_string($con, $_POST['apellidomaterno']);
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$rol_id = mysqli_real_escape_string($con, $_POST['detalles']);

		$sql = "INSERT INTO usuarios SET nombre='$nombre', apellidopaterno='$apellidopaterno', apellidomaterno='$apellidomaterno', username='$username', password='$password', rol_id='$rol_id'";

		$query_run = mysqli_query($con, $sql);
		if($query_run)
		{
			
		$username = mysqli_real_escape_string($con, $_POST['username']);
		

		$sql = "INSERT INTO informacion SET username='$username'";

		$query_run = mysqli_query($con, $sql);
		if($query_run)
		{
			$_SESSION['message'] = "Usuario creado exitosamente";
			if($rol_id = 3){
                header("Location: alumnomaestria/perfil.php");
            }else{
                header("Location: alumnoespecialidad/perfil.php");
            }
			exit(0);
		}
		else
		{
			$_SESSION['message'] = "Error al crear el usuario";
			header("Location: error.html");
			exit(0);
		}
		}
		else
		{
			$_SESSION['message'] = "Error al crear el usuario";
			header("Location: error.html");
			exit(0);
		}

    }
    else
    {
        $_SESSION['message'] = "Error al crear el usuario";
        header("Location: error.html");
        exit(0);
    }
}

?>