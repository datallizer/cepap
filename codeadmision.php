<?php
session_start();
require 'dbcon.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if(isset($_POST['delete']))
{
    $registro_id = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM admisiones WHERE id='$registro_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Eliminado exitosamente";
        header("Location: monitoradmisiones.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al eliminar";
        header("Location: monitoradmisiones.php");
        exit(0);
    }
}

if(isset($_POST['update']))
{
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $apellidopaterno = mysqli_real_escape_string($con, $_POST['apellidopaterno']);
    $apellidomaterno = mysqli_real_escape_string($con, $_POST['apellidomaterno']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telefono = mysqli_real_escape_string($con, $_POST['telefono']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $query = "UPDATE `admisiones` SET `nombre` = '$nombre', `apellidopaterno` = '$apellidopaterno', `apellidomaterno` = '$apellidomaterno', `email` = '$email', `telefono` = '$telefono', `status` = '$status' WHERE `admisiones`.`id` = '$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Editado exitosamente";
        header("Location: monitoradmisiones.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error al editar";
        header("Location: monitoradmisiones.php");
        exit(0);
    }

}


if(isset($_POST['save'])){
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $apellidopaterno = mysqli_real_escape_string($con, $_POST['apellidopaterno']);
    $apellidomaterno = mysqli_real_escape_string($con, $_POST['apellidomaterno']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
	$telefono = mysqli_real_escape_string($con, $_POST['telefono']);
	$detalles = mysqli_real_escape_string($con, $_POST['detalles']);
	$status = '1';

    $check_email_query = "SELECT * FROM usuarios WHERE email='$email' LIMIT 1";
    $result = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message'] = "El correo ingresado ya esta en uso, inicia sesión o registrate con un correo diferente";
        header("Location: registro.php");
        exit(0);
    } else{}

	$asunto = 'ADMISION';
	$cuerpo = "Nombre: ".$nombre. " " .$apellidomaterno. " " .$apellidopaterno. " Email: " .$email." Telefono: ".$telefono." Username: ".$username." Detalles: ".$detalles."". $_POST['cuerpo'];

	 $_SESSION['username'] = $username;
     $headers = "From: admisiones@cepap.edu.mx\r\n";
            $headers .= "Reply-To: admisiones@cepap.edu.mx\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	if(mail('admisiones@cepap.edu.mx', $asunto, $cuerpo) && mail($email, $asunto, $cuerpo, $headers)){
	 	echo "Correo enviado";
	 }

    $query = "INSERT INTO admisiones SET nombre='$nombre', apellidopaterno='$apellidopaterno', apellidomaterno='$apellidomaterno', username='$username', email='$email', telefono='$telefono', detalles='$detalles', status='$status' ";

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
                header("Location: monitoradmisiones.php");
            }else{
                header("Location: monitoradmisiones.php");
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